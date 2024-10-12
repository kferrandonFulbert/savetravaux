#include <stdio.h>
#include <stdlib.h>
#define TITRE "\t\t\t____________________Mini Calculette_________________\n\n\n"
/* Ex: ecrire une mini calculette

*/


float ADD(float,float);
float SUB(float,float);
float MUL(float,float);
float DIV(float,float);

float ADD(float a, float b)
{
	return(a+b);
}
float SUB(float a, float b)
{
	return(a-b);
}
float MUL(float a, float b)
{
	return(a*b);
}
float DIV(float a, float b)
{
	return(a/b);
}

void main()
{
int choix;
float x,y;

	do
	{
		
		system("CLS");
		printf(TITRE);
		printf("\n1)Addition");
		printf("\n2)Soustraire");
		printf("\n3)Multiplication");
		printf("\n4)Division");
		printf("\n0)Quitter");
		printf("\nEntrer votre choix");
		scanf("%d",&choix);
		printf("\ndonner 2 nb");
		scanf("%f %f",&x,&y);
		
		switch (choix)
		{
		case 1: printf("La somme est %f",ADD(x,y));
			break;
		case 2: printf("La soustraction est %f",SUB(x,y));
			break;
		case 3: printf("La multiplication est %f",MUL(x,y));
			break;
		case 4: printf("La Division est %f",DIV(x,y));
			break;
		default:
			break;
		}
		system("PAUSE");
	}while(choix !=0);
}