#include <stdio.h>
#include <stdlib.h>
#include <math.h>

#define ABS(x) (x>=0?x:-x)
#define TITRE "\t\tMathematique\n\n\n"
/*
Réaliser  les fonction suivante:
  */
int oppose(int);
void pairimpair(int);
void diviseurs(int);
void premier(int);
int puissance(int,int);
float inverse(int);
double racine(int);
int oppose(int x)
{
	return (-x);
}
void pairimpair(int x)
{
	if(x%2==0)
	{
		printf("%d est pair",x);
	}
	else
	{
		printf("%d est impair",x);
	}
}
void diviseurs(int a)
{
	int i;
	for(i=0;i<a;i++)
	{
		if(a%i==0)
		{
			printf("%d est divisible par %d",a,i);
		}
	}
}
void premier(int x)
{
	int i;
	bool btest = false;
	for(i=2;i<x;i++)
	{
		if(x%i==0)
		{
			btest=true;
		}
	}
	if (btest==true)
	{
		printf("%d n est pas un nombre premier",x);
	}
	else
	{
		printf("%d est un nombre premier",x);
	}
}
int puissance(int x, int y)
{
	int i;
	int p=1;
	for(i=1;i<=y;i++)
	{
		p=p*x;
	}
	return(p);
}
float inverse(int x)
{
	float a;
	a=x;
	a=1/a;
	return a;
}
double racine(int x)
{
	double a;
	a=sqrt(x);
	return a;
}
void main()
{
int choix;
int x,y;

	do
	{
		
		system("CLS");
		printf(TITRE);
		printf("\n1)OPPOSER");
		printf("\n2)PAIR IMPAIR");
		printf("\n3)DIVISEUR");
		printf("\n4)PREMIER");
		printf("\n5)PUISSANCE");
		printf("\n6)INVERSE");
		printf("\n7)RACINE");
		printf("\nEntrer votre choix ");
		scanf("%d",&choix);
		
		
		switch (choix)
		{
		case 1: printf("\ndonner 1 nb");
		scanf("%d",&x);
			printf("L oppose du nombre %d est %d",x,oppose(x));
			break;
		case 2: printf("\ndonner 1 nb");
		scanf("%d",&x);
			pairimpair(x);
			break;
		case 3: printf("\ndonner 1 nb");
		scanf("%d",&x);
				diviseurs(x);
			break;
		case 4: printf("\ndonner 1 nb");
		scanf("%d",&x);
			premier(x);
			break;
		case 5: printf("\ndonner 2 nb");
		scanf("%d %d",&x,&y);
				printf("Le resultat est %d",puissance(x,y));
		break;
		case 6: printf("\ndonner 1 nb");
		scanf("%d",&x);
			printf("L'inverse de %d est %f",x,inverse(x));
		break;
		case 7: printf("\ndonner 1 nb");
		scanf("%d",&x);
			printf("La racine de %d est %f",x,racine(x));
		break;
		default:
			break;
		}
		system("PAUSE");
	}while(choix !=0);
}