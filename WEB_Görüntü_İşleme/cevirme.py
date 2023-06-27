import cv2 
import matplotlib.pyplot as plt
import sys


resim_adi = sys.argv[1]
cevirme = sys.argv[2]

resim = cv2.imread(resim_adi)

# 0 => yatay çevirme, ayna görüntüsü
# 1 => dikey çevirme, ayna görüntüsü

# yeni_resim_yatay = cv.flip(resim, 0)
# yeni_resim_dikey = cv.flip(resim, 1)
# yeni_resim_yatay_dikey = cv.flip(yeni_resim_yatay, 1)


if (int(cevirme) == 1 ):
    yeni_resim_yatay = cv2.flip(resim, 0)
    cv2.imwrite(resim_adi, yeni_resim_yatay)

    #cv.imshow("yatay",yeni_resim_yatay)

if (int(cevirme) == 2 ):
    yeni_resim_dikey = cv2.flip(resim, 1)
    cv2.imwrite(resim_adi, yeni_resim_dikey)

    #cv.imshow("dikey",yeni_resim_dikey)

if (int(cevirme) == 3 ):
    yeni_resim_yatay = cv2.flip(resim, 0)
    yeni_resim_yatay_dikey = cv2.flip(yeni_resim_yatay, 1)
    cv2.imwrite(resim_adi, yeni_resim_yatay_dikey)
    
    #cv.imshow("yatay",yeni_resim_yatay_dikey)
