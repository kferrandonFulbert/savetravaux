#include <stdio.h>
#include <stdlib.h>
void pairimpair();
int somme(int a,int b);

int somme(int a, int b)
{
	int s,i;
	s=0;
	for(i=0;i<=b;i++)
	{
		s+=i;
	}
	return(s);
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

void main()
{
	int a,som;
	a=0;
	printf("Donner un nombre\n");
	scanf("%d",a);
	som=somme(a,10);
	printf("\nla somme est %d",som);
	//pairimpair(a);
	//system("PAUSE");

}