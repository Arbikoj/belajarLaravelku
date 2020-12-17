#include <stdio.h>
#include <string.h>

int main()
{
    int besar = 0, kecil = 0, vokal = 0, konsonan = 0, angka = 0, spasi = 0;
    char kalimat[100];
    gets(kalimat);
    for (int i = 0; i < strlen(kalimat); i++)
    {
        int temp = kalimat[i];
        if (temp >= 'a' && temp <= 'z')
        {
            kecil += 1;
        }
        else if (temp >= 'A' && temp <= 'Z')
        {
            besar += 1;
        }
        if (temp == 'a' || temp == 'i' || temp == 'u' || temp == 'e' || temp == 'o' || temp == 'A' || temp == 'I' || temp == 'U' || temp == 'E' || temp == 'O')
        {
            vokal += i;
        }
        else if (temp == ' ')
        {
            spasi += 1;
        }
        else if (temp >= 0 && temp <= 9)
        {
            angka += 1;
        }
        else
        {
            konsonan += 1;
        }
    }
    printf("kapital : %d\n", besar);
    printf("non - kapital : %d\n", kecil);
    printf("vokal : %d\n", vokal);
    printf("konsonan : %d\n", konsonan);
    printf("angka : %d\n", angka);
    printf("spasi : %d\n", spasi);

    return (0);
}
