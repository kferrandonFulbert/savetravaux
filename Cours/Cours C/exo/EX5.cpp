#include <stdio.h>
#include <stdlib.h>
#define ABS(x) (x>=0?x:-x)

/*
Ex5:
ecrire un prog qui qui permet de trier directement un tableau de 10 entier à la saisi.
A chaque saisie d'un entier, on le stock dans sa place.
ex saisi 5 3 4
on place 3 4 5 

ex6:
On saisi un tableau de 10 entiers
et on offre à l'utilisateur la possibilité de réaliser 
un nombre de rotation a gauche ou a droite du tableau.
2,5,6,8
vers la droite
8,2,5,6 ...

  Ex7
ecrir un prog qui saisi un tableau de 10 entier
et qui affiche les occurences de ses elements sans redondance.
  */

int tab[10];


void main()
{

	int i,j ;
	int tmp;
	int tab[10];
	for(i=0 ;i<10 ;i++)
	{
		printf("Donner l'element %d: ",i+1);
		scanf("%d",&tab[i]);
		for (j=1;j<=i;j++)
		{
			if(tab[j-1]>tab[j])
			{
				tmp=tab[j-1];
				tab[j-1]=tab[j];
				tab[j]=tmp;
			}
				
		}
	}	
	for(i=0 ;i<10 ;i++)
	{
		printf("\ntab[%d]=%d ",i+1,tab[i]);	
	}
}