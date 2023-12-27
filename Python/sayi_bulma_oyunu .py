import random

def random_sayi_olusturma():
    while True:
        dört_basamakli_sayi = random.randint(1000, 9999)
        if(len(set(str(dört_basamakli_sayi)))) == 4:
            return dört_basamakli_sayi

def sayi_tahmin_oyunu(number1, number2):
    res_one = 0
    res_two = 0
    digit = 0
    nbr1_digits = [int(d) for d in str(number1)]

    while (digit < 4):
        if (int(str(number1)[digit])) == (int(str(number2)[digit])):
            res_one += 1
        elif (int(str(number2)[digit]) in nbr1_digits):
            res_two += 1
        digit += 1
    return res_one, res_two

random_sayi = random_sayi_olusturma()
while True:
    girilen_sayi = int(input("4 basamakli bir sayi giriniz... : "))
    if(len(set(str(girilen_sayi)))) < 4:
        print("girilen sayinin rakamlari birbirinden farkli olmalidir!")
    elif (not(1000 <= girilen_sayi < 10000)):
        print("girilen sayi dört basamakli olmalidir!")
    else:
        if (random_sayi == girilen_sayi):
            print("Tebrikler, sayiyi doğru tahmin ettiniz...")
            break
        else:
            print(sayi_tahmin_oyunu(random_sayi, girilen_sayi))
