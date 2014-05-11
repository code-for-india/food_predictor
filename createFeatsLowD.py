import numpy as np
import ipdb
import csv
from sklearn import linear_model 
from sklearn.svm import SVC
import matplotlib.pylab as pb
import cPickle
#file_name = "/home/sunit/Desktop/akshayaPatra/code/code_for_india/CSV_Data/indenthkh.csv"

#data=csv.reader(open(file_name)) 




#
    #
#	rowSplit=row.replace('[','')#.replace('"]','').split(';')

id_map={}
total_food_item=0

with open('id_list') as fid:
    for ele in fid:
        total_food_item += 1
        food_id,name=ele.strip().split('\t')
        id_map[name]=food_id



def writeModel(model_name,model):
    with open(model_name,'wb') as mid:
        cPickle.dump(model,mid)



def getData(id_dict,total_food_item_param):
    fileName='GHLS_HAMUMANTH'
    
    fullFeatures=list()
    full_People=list()
    with open(fileName) as fid:
        date_old=''
        feats=np.zeros(total_food_item_param)

        for  ele in fid:
            temp_dict=eval(ele)
            date_new = temp_dict["INDENTDATE"]

            if not date_old=='':
                if not date_old == date_new  :
                    # Old feature complete
                    fullFeatures.append(feats)
                    feats=np.zeros(total_food_item_param)
                    full_People.append(people)

            people = temp_dict["Indentqty"]

            item=temp_dict["bomname"]
            if '\\' in item:
                item=item.replace('\\','')
            
            food_id = id_dict[item.split('-')[0].strip()]
            
            feats[int(food_id)]=1
            date_old = date_new
          
        
    return fullFeatures,full_People
            
#Interface to create features if input is an array of record entries
def processEachEntry(arrayList,total_food_item_param,id_dict):
    
    fullFeatures=list()
    full_People=list()
    date_old=''
    feats=np.zeros(total_food_item_param)

    for  ele in arrayList:
        temp_dict=eval(ele)
        date_new = temp_dict["INDENTDATE"]

        if not date_old=='':
            if not date_old == date_new  :
                # Old feature complete
                fullFeatures.append(feats)
                feats=np.zeros(total_food_item_param)
                full_People.append(people)

        people = temp_dict["Indentqty"]

        item=temp_dict["bomname"]
        if '\\' in item:
                item=item.replace('\\','')
            
        food_id = id_dict[item.split('-')[0].strip()]
        
        feats[int(food_id)]=1
        date_old = date_new
      
        
    return fullFeatures,full_People

#Interface to create features from data having food id
def getDataClean(fileName):
    
    fullFeatures=list()
    full_People=list()
    with open(fileName) as fid:
        date_old=''
        feats=np.zeros(total_food_item_param)

        for  ele in fid:
            temp_dict=eval(ele)
            date_new = temp_dict["INDENTDATE"]

            if not date_old=='':
                if not date_old == date_new  :
                    # Old feature complete
                    fullFeatures.append(feats)
                    feats=np.zeros(total_food_item_param)
                    full_People.append(people)

            people = temp_dict["Indentqty"]

            food_id=temp_dict["bomname"].strip()
            
            feats[int(food_id)]=1
            date_old = date_new
          
        
    return fullFeatures,full_People
            

def BayesianRidge(features,people,percentage_of_testing):
    clf = linear_model.BayesianRidge()
    clf.fit(features[:-int(percentage_of_testing*len(features))], people[:-int(percentage_of_testing*len(features))])
    results=clf.predict(features[int(percentage_of_testing*len(features)):])
    fig1=pb.figure()
    ax1=fig1.add_subplot(111)
    ax1.plot(results,label='Predicted')
    ax1.plot(people[:-int(percentage_of_testing*len(features))],label='Actual')
    ax1.set_title('Linear Bayesian Ridge')
    pb.legend(loc='upper left');
    from sklearn.metrics import accuracy_score
    print "Linear BayesianRidge:", clf.score(features[int(percentage_of_testing*len(features)):],people[int(percentage_of_testing*len(features)):])
def SVC_Poly(features,people,percentage_of_testing):
    clf = SVC(kernel='poly', degree=3)
    clf.fit(features[:-int(percentage_of_testing*len(features))], people[:-int(percentage_of_testing*len(features))])
    results=clf.predict(features[int(percentage_of_testing*len(features)):])
    fig1=pb.figure()
    ax1=fig1.add_subplot(111)
    ax1.plot(results,label='Predicted')
    ax1.plot(people[:-int(percentage_of_testing*len(features))],label='Actual')
    ax1.set_title('SVC- Poly')
    pb.legend(loc='upper left');
    from sklearn.metrics import accuracy_score
    print "SVM polynomial:", clf.score(features[int(percentage_of_testing*len(features)):],people[int(percentage_of_testing*len(features)):])


def LinearRidge(features,people,percentage_of_testing):
    clf = linear_model.Ridge(alpha=.5)
    clf.fit(features[:-int(percentage_of_testing*len(features))], people[:-int(percentage_of_testing*len(features))])
    results=clf.predict(features[int(percentage_of_testing*len(features)):])
    fig1=pb.figure()
    ax1=fig1.add_subplot(111)
    ax1.plot(results,label='Predicted')
    ax1.plot(people[:-int(percentage_of_testing*len(features))],label='Actual')
    ax1.set_title('Linear Regression Ridge')
    pb.legend(loc='upper left');
    from sklearn.metrics import accuracy_score
    print "Linear Ridge:", clf.score(features[int(percentage_of_testing*len(features)):],people[int(percentage_of_testing*len(features)):])
    
    
def LinearRegression(features,people,percentage_of_testing):
    clf = linear_model.LinearRegression()
    clf.fit(features[:-int(percentage_of_testing*len(features))], people[:-int(percentage_of_testing*len(features))])
    results=clf.predict(features[int(percentage_of_testing*len(features)):])
    fig1=pb.figure()
    ax1=fig1.add_subplot(111)
    ax1.plot(results,label='Predicted')
    ax1.plot(people[:-int(percentage_of_testing*len(features))],label='Actual')
    ax1.set_title('Linear Regression')
    pb.legend(loc='upper left');
    from sklearn.metrics import accuracy_score
    print "Linear Regression:", clf.score(features[int(percentage_of_testing*len(features)):],people[int(percentage_of_testing*len(features)):])
    
    
def RBF_Kernel(features,people,percentage_of_testing):
    clf=SVC(kernel='rbf')
    clf.fit(features[:-int(percentage_of_testing*len(features))], people[:-int(percentage_of_testing*len(features))])
    results=clf.predict(features[int(percentage_of_testing*len(features)):])
    fig2=pb.figure()
    ax2=fig2.add_subplot(111)
    ax2.plot(results,label='Predicted')
    ax2.plot(people[:-int(percentage_of_testing*len(features))],label='Actual')
    ax2.set_title('SVC-RBF')
    
    print "SVC:", clf.score(features[int(percentage_of_testing*len(features)):],people[int(percentage_of_testing*len(features)):])
    pb.legend(loc='upper left');
    
def SVC_Linear(features,people,percentage_of_testing):
    clf = SVC(kernel='linear', C=1).fit(features[:-int(percentage_of_testing*len(features))], people[:-int(percentage_of_testing*len(features))])
    results=clf.predict(features[int(percentage_of_testing*len(features)):])
    fig2=pb.figure()
    ax2=fig2.add_subplot(111)
    ax2.plot(results,label='Predicted')
    ax2.plot(people[:-int(percentage_of_testing*len(features))],label='Actual')
    ax2.set_title('SVC')
    
    print "SVC:", clf.score(features[int(percentage_of_testing*len(features)):],people[int(percentage_of_testing*len(features)):])
    pb.legend(loc='upper left')


#features,people = getData(id_map, total_food_item)
#percentage_of_testing=0.95
#SVC_Poly(features,people,percentage_of_testing)
#SVC_Linear(features,people,percentage_of_testing)
#
#pb.show()

