



CREATE DATABASE IF NOT EXISTS `tema_biblioteca`;



CREATE TABLE IF NOT EXISTS `usuario` (
  `senha` smallint(4) NOT NULL, 
  `nomeusuario` varchar(30) NOT NULL,
  PRIMARY KEY (senha)
) ;

INSERT INTO `usuario` (`senha`, `nomeusuario`) VALUES
(1234, 'Rodrigo');



CREATE TABLE IF NOT EXISTS `livros` (
  `isbn` smallint(4) NOT NULL, 
  `titulo` varchar(30) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `editora` varchar(30) NOT NULL,
  `ano` smallint(4) NOT NULL,
  PRIMARY KEY (`isbn`)
) ;

INSERT INTO `livros` (`isbn`, `titulo`, `autor`, `editora`, `ano`) VALUES
(11, 'Maus', 'Art Spiegelman', 'Quadrinhos na Cia', '2005'),
(12, 'Fragmentos do Horror', 'Junji Ito', 'Darkside', '2017'),
(13, 'Mitologia Nordiga', 'Neil Gaiman', 'Intrinseca', '2018'),
(14, 'Blecaute', 'Marcelo Rubens Paiva', 'Brasiliense', '1990');



CREATE TABLE IF NOT EXISTS `autores` (
  `nomeaut` varchar(30) NOT NULL, 
  `pais` varchar(30) NOT NULL,
  PRIMARY KEY (`nomeaut`)
) ;

INSERT INTO `autores` (`nomeaut`, `pais`) VALUES
('Art Spiegelman', 'Suecia'),
('Junji Ito', 'Japao'),
('Neil Gaiman', 'Reino Unido'),
('Marcelo Rubens Paiva', 'Brasil');



CREATE TABLE IF NOT EXISTS `clientes` (
  `matricula` smallint(5) NOT NULL AUTO_INCREMENT , 
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  PRIMARY KEY (`matricula`)
);


INSERT INTO `clientes` (`matricula`, `nome`, `telefone`) VALUES
(1, 'Ana', '911111111'),
(2, 'Carlos', '922222222'),
(3, 'Samuel', '933333333'),
(4, 'Vanessa', '944444444');