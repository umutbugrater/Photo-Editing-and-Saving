import cv2 
import sys

dosya_adi = sys.argv[1]
genislik = sys.argv[2]
yükseklik = sys.argv[3]
print(dosya_adi,genislik,yükseklik)


resim = cv2.imread(dosya_adi)
yeni_resim = cv2.resize(resim,(int(genislik),int(yükseklik)))

cv2.imwrite(dosya_adi, yeni_resim)