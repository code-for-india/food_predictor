import urllib2
from createFeatsLowD import *

url="http://54.186.127.137/cfi/consumptiondata.php?locationid=536dbd1a340e655369f097e6"
#url="http://54.186.127.137/cfi/consumptiondata.php?locationid=536dbd1a340e655369f097fa"
#url="http://54.186.127.137/cfi/consumptiondata.php?locationid=536dbd1a340e655369f097e7"
req = urllib2.Request(url)
response = urllib2.urlopen(req)
#print response.read().split('<br>')

features,people = processEachEntry(response.read().split('<br>')[1:-1],total_food_item,id_map)
percentage_of_testing=0.75
#SVC_Poly(features,people,percentage_of_testing)
#SVC_Linear(features,people,percentage_of_testing)
#BayesianRidge(features,people,percentage_of_testing)
LinearRidge(features,people,percentage_of_testing)
#LinearRegression(features,people,percentage_of_testing)
pb.show()

