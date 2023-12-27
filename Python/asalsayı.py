def asal_sayi(sayi):
    if sayi<=1:
        print("girilen sayi asal değildir.")
        return
    i = 2
    while i <= sayi // 2:
        if (sayi % i == 0):
            print("girilen sayi asal değildir.")
            return
        i += 1
    print("girilen sayi asaldir.")
sayi = int(input("bir asal sayi giriniz: "))
asal_sayi(sayi)


