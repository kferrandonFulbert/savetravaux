#include <stdio.h>
#include <stdlib.h>
#define ABS(x) (x>=0?x:-x)

/*
EX2:
ecrire un prog qui saisi un tab de 10 entier et qui determine la distance max 2 element consécutif
  */

int tab[10];


void main()
{

	int i ;
	int max;
	int tab[10];
	for(i=0 ;i<10 ;i++)
	{
		printf("Donner l'element %d: ",i+1);
		scanf("%d",&tab[i]);
	}
	
	max=ABS(tab[1]-tab[0]);

	for(i=1;i<10;i++)
	{
		if(ABS(tab[i]-tab[i-1])> max)
		{
			max = ABS(tab[i]-tab[i-1]);
		}
	}
	printf("\nLa val max est %d ",max);
	
}