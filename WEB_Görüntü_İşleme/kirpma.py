import cv2 as cv
from PIL import Image
import sys

resim_adi = sys.argv[1]
x1 = int(sys.argv[2])
x2 = int(sys.argv[3])
y1 = int(sys.argv[4])
y2 = int(sys.argv[5])

resim = cv.imread(resim_adi)
# print(resim.shape[0])
# print(resim.shape[1])

if(x1 == 0 and x2 == 0):
    x1 = 0
    x2 = resim.shape[1]
if(y1 == 0 and y2 ==0):
    y1 = 0
    y2 = resim.shape[0]

if (x1 > resim.shape[1] and x2 > resim.shape[1]):
    print("Girilen her iki x değeri de resmin boyutundan büyüktür. Bu yüzden kırpma işlemi yapılamaz")
elif (y1 > resim.shape[0] and y2 > resim.shape[0]):
    print("Girilen her iki y değeri de resmin boyutundan büyüktür. Bu yüzden kırpma işlemi yapılamaz")

if (x1<x2 and y1 < y2):
    yeni_resim = resim[y1:y2,x1:x2]
    cv.imwrite(resim_adi, yeni_resim)

elif (x1<x2 and y2 < y1):
    yeni_resim = resim[y2:y1,x1:x2]
    cv.imwrite(resim_adi, yeni_resim)

elif (x2<x1 and y1 < y2):
    yeni_resim =  resim[y1:y2,x2:x1]
    cv.imwrite(resim_adi, yeni_resim)

elif (x2<x1 and y2 < y1):
    yeni_resim = resim[y2:y1,x2:x1]
    cv.imwrite(resim_adi, yeni_resim)


