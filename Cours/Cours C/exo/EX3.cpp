#include <stdio.h>
#include <stdlib.h>

/*
EX2:
ecrire un prog qui saisi un tab de 10 entier et qui determine la distance max 2 element consécutif
  */

int tab[10];


void main()
{

	int i ;
	int tmp;
	bool btest;
	int tab[10];
	for(i=0 ;i<10 ;i++)
	{
		printf("Donner l'element %d: ",i+1);
		scanf("%d",&tab[i]);
	}

	do
	{
		btest=false;
	for(i=0;i<9;i++)
	{
		if(tab[i]>tab[i+1])
		{
			tmp = tab[i];
			tab[i] = tab[i+1];
			tab[i+1]=tmp;
			btest=true;
		}
	}

	}while(btest==true);
	
	for(i=0 ;i<10 ;i++)
	{
		printf("\ntab[%d] = %d ",i+1,tab[i]);
		
	}
	system("PAUSE");
}