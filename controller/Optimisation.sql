Set timing on;
Set autotrace on;

select P.nomProduit 
From Produits P
Join LignesCommande L on L.idProduit = P.idProduit
Join Commandes C on C.idCommande = L.idCommande
Join Clients Cl on Cl.idClient = C.idClient
Where Cl.nomClient = 'Palleja'

B )

Set timing on;
Set autotrace on;

select P.nomProduit 
From Produits P
Where P.idProduit IN (
	Select Lc.idProduit 
	From LignesCommande Lc 
	Where Lc.idCommande in (
		Select C.idCommande
		From Commandes C
		Where C.idClient in(
			Select Cl.idClient
			From Clients Cl
			where Cl.nomClient = 'Palleja')));

11a) 
Select * From Clients C 
where C.idClient NOT IN (Select Co.idClient From Commandes Co);

11b) 

Select * From Clients C
Minus (Select * From Commandes Co )

12a)

Select idCommande,dateCommande
From Commandes 
Where idCommande NOT IN (Select idCommande 
		From(Select idCommande,idProduit From Commandes
			Cross Join Produits
			Minus
			Select idCommande,idProduit From LignesCommande))