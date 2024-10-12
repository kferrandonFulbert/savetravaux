#include <stdio.h>
#include <stdlib.h>

/*
EX4:
On saisi deux tableaux de 10 entiers chacun trié en ordre coissant et on les fusionne directement
dans un tableau se 20 entier
  */

int tab[10];


void main()
{

	int i,j,k ;
	int tmp;
	bool btest;
	int tab[10],tab2[10],Tfus[20];
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
		printf("Donner l'element %d: ",i+1);
		scanf("%d",&tab2[i]);
	}
		do
		{
		btest=false;
		for(i=0;i<9;i++)
		{
			if(tab2[i]>tab2[i+1])
			{
				tmp = tab2[i];
				tab2[i] = tab2[i+1];
				tab2[i+1]=tmp;
				btest=true;
			}
		}
	}while(btest==true);
	k=0;
	i=0;
	j=0;
	do
	{
		if(i==10)
		{
			Tfus[k]=tab2[j];
			j++;
		}
		else if (j==10)
		{
			Tfus[k]=tab[i];
			i++;
		}
		else if(tab[i]<tab2[j] && i<10 && j < 10)
		{
			Tfus[k]=tab[i];
			i++;
		}
		else 
		{
			Tfus[k]=tab2[j];
			j++;
		}
			k++;

	}while(k<21);
	
	for(i=0;i<20;i++)
	{
		printf("\ntab[%d]=%d",i+1,Tfus[i]);
	}


	system("PAUSE");
}