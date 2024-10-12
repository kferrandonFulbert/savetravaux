#include <stdio.h>
#include <stdlib.h>

/*
EX1:
ecrire un prog qui saisi un tab de 10 entier et une valeur a rechercher,
 le prog affiche le nombre
  */

int tab[10];

int cherche();
int cherche(int val)
{
	int i;
	int cpt=0;
	for(i=0;i<10;i++)
	{
		if(val==tab[i]) cpt++;
	}
	return cpt;

}
void main()
{

	int i ;
	int val2;
	for(i=0 ;i<10 ;i++)
	{
		printf("Donner l'element %d: ",i+1);
		scanf("%d",&tab[i]);
	}
	printf("Quel nb chercher vous : ");
	scanf("%d",&val2);
	printf("\n\n la valeur %d apparait %d fois ",val2,cherche(val2));

}
