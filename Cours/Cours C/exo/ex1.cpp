#include <stdio.h>
#include <stdlib.h>
#include <iostream.h>

void main()
{
	int tab[10] ;
	int i ;
	int min,max,val;
	for(i=0 ;i<10 ;i++)
	{
		printf("Donner l'element %d: ",i+1);
		scanf("%d",&tab[i]);
		if(i==1)
		{
			min=tab[i];
			max=tab[i];
		}
		else
		{
			if(tab[i]>max)
			{
				max=tab[i];
			}
			if(tab[i]<min)
			{
				min=tab[i];
			}
		}
	}
	printf("\n\nLe minimum est %d et le max est %d",min,max);
	system("PAUSE");
	for(i=0;i<10;i++)
	{
		printf("\n element de la case %d est %d",i+1,tab[i]) ;
	}
	system("PAUSE");
	
	float moy=0;
	for(i=0;i<10;i++)
	{
		moy=moy+tab[i];
	}
	moy /=10;
	printf("La moyenne est %.2f",moy);
	bool btest;
	btest=false;
	printf("entrer la valeur a rechercher: ");
	scanf("%d",&val);
	i=0;
	while(i<10 && btest==false)
	{
		if(tab[i]==val)
		{
			btest=true;
		}
		else
		{
			i++;
		}
	}
	if(btest==true)
	{
		printf("\n\nLa valeur %d est a la position %d",val,i+1);
	}
	else
	{
		printf("\n\n la valeur n'existe pas");
	}
	int j,tmp;

	for(i=0;i<10;i++)
	{
		for(j=i;j<10;j++)
		{
			if(tab[i]>tab[j])
			{
				tmp=tab[i];
				tab[i]=tab[j];
				tab[j]=tmp;
			}
		}
	}
	printf("\n\nTableau trier en ordre croissant\n\n");
	for(i=0;i<10;i++)
	{
		printf("tab[%d]=%d",i+1,tab[i]);
	}

}