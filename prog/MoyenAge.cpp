#include <iostream.h>

#define ROI "\nRoi Galnuc dis: "
/* Class perso
//						//
//						//
//                     */
class Perso
{
private:
	int cAge;
	int cIntel;
	int cDext;
	int cSage;

public: 
	void Init(int Age, int Intel, int Dext);
	void AffAge();
	void AffInt();
	void AffDext();
	void IntChange(int Intel);
	void InitSage(int Sage);
};


void Perso::Init(int Age, int Intel, int Dext)
{
	cAge = Age;
	cIntel = Intel;
	cDext = Dext;
}
void Perso::InitSage(int Sage)
{
	cSage = Sage;
}

void Perso::IntChange(int Intel)
{
	cIntel = Intel;
}
void Perso::AffAge()
{
	cout <<"\n" << cAge;
}
void Perso::AffInt()
{
	cout <<"\n" << cIntel;
}
void Perso::AffDext()
{
	cout <<"\n" << cDext;
}
/////////////////////////////////////////
//FIN de declaration de la Classe perso
/////////////////////////////////////////

void Chambre(Perso Hero)
{
	int choix;
	int Sage;
	cout << "\nIl est 5H vous entrez dans votre chambre...\n";
	cout << "vous voyez un simple lit avec une petite chambre de chevet.\n";
	cout << "vous obsrever egalement une fenetre, une bougie, un bureau,et une armoir.\n";
CH1:
	cout << "\n\nQue voulez vous faires?\n";
	cout << "1)vous reposez, 2)fouillez la chambre, 3) visiter le chateau?\n";
	cin >> choix;
	switch(choix)
	{
	case 1: Sage = 12;
		Hero.InitSage(Sage);
		cout << "vous faites une sieste qui vous as redonn� des force.\n";
		break;
	case 2: cout << "Ou voulez vous aller?";
		break;
	case 3:
		break;
	default: goto CH1;
	}
}
/////////////////////////
// Fonction principal
// histoire 
/////////////////////////

void main()
{
	int Age, Intel, Dext;
	char fin[1];
	Perso Hero;
	cout <<ROI << "Bonjour a toi chevalier\n Je sais que tu viens de loin ...\n Et je te remerci d'avoir repondu present a ma requete\n";
// renvoi pr l'age si erreur
Q1:
	cout <<"\n" << ROI << " Quel age as tu?\n";
	cout <<"Vous reponder : ";
	cin >> Age;

	if (Age < 15 || Age > 40)
	{
		cout << ROI << "Je suis desoler mais cette quete ne conviendra pas a un chevalier de cette age\n";
		goto Q1;
	}

	Intel = 10;
	Dext = 10;
	Hero.Init(Age, Intel, Dext);
	cout << "\n\n" << ROI << "Fort bien maintenant je vais vous montrer votre dortoir";
	cout << " Je pense que vous devez etre fatiguer et nous servirons le souper pour 18h00\n\n";

//	Hero.AffAge();
	Chambre(Hero);

	cout <<"\n\n Fin?(o/n)";
	cin >> fin;	
}