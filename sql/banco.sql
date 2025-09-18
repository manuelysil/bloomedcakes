CREATE DATABASE bloomed_cakes;
USE bloomed_cakes;

create table Produtos(
    idProdutos INT AUTO_INCREMENT PRIMARY KEY,
    tipoProdutos varchar(100) NOT NULL,
    nomeProdutos varchar(150) NOT NULL,
    pesoReferencia varchar(10),
    tempoPreparo varchar(20),
    foto    TEXT,
    galeriaFotos    TEXT
);


create table Ingredientes(
    idIngredientes INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL,
    foto    TEXT,
    marca varchar(50),
    fornecedor varchar(50),
    descricao   TEXT
);


create table Ingredientes_Produtos(
    idProdutos INT,
    idIngredientes INT,
    unidadeMedida varchar(20),
    peso DECIMAL(10,2),
    PRIMARY KEY (idProdutos,idIngredientes),
    FOREIGN KEY (idProdutos) REFERENCES Produtos(idProdutos),
    FOREIGN KEY (idIngredientes) REFERENCES Ingredientes(idIngredientes)
);


INSERT INTO Produtos (tipoProdutos, nomeProdutos, pesoReferencia, tempoPreparo, foto, galeriaFotos) 
VALUES (
    'Bolo de Casamento',
    'Chocolate com Coco',
    '10kg',
    '48h',
    NULL,
    NULL
);

INSERT INTO Produtos (tipoProdutos, nomeProdutos, pesoReferencia, tempoPreparo, foto, galeriaFotos) 
VALUES (
    'Flor Porcelana Fria',
    'girassol',
    '30g',
    'mais ou menos 12h',
    NULL,
    NULL
);

INSERT INTO Produtos (tipoProdutos, nomeProdutos, pesoReferencia, tempoPreparo, foto, galeriaFotos) 
VALUES (
    'Flor em Acucar',
    'girassol',
    '30g',
    'mais ou menos 12h',
    NULL,
    NULL
);


INSERT INTO Ingredientes (tipoIngredientes, nomeIngredientes, pesoReferencia, tempoPreparo, foto, galeriaFotos) 
VALUES (
    'Castanhas',
    'Nozes',
    '200g',
    '0',
    NULL,
    NULL
);


