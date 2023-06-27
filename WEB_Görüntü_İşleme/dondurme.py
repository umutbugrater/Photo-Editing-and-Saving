from PIL import Image
import sys

resim_adi = sys.argv[1]
dondurulecekAci = sys.argv[2]

resim = Image.open(resim_adi)

yeni_resim = resim.rotate(int(dondurulecekAci))
#yeni_resim.show()
yeni_resim.save(resim_adi)
