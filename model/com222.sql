-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jul-2019 às 23:59
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `com222`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativa_questao`
--

CREATE TABLE `alternativa_questao` (
  `id` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `correta` tinyint(1) NOT NULL,
  `texto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alternativa_questao`
--

INSERT INTO `alternativa_questao` (`id`, `id_questao`, `correta`, `texto`) VALUES
(2, 7, 0, '3,00 cm'),
(3, 7, 0, '2,50 mm'),
(4, 7, 0, '5,00 mm'),
(5, 7, 1, '0'),
(6, 8, 0, '8,74 m'),
(7, 8, 0, '10,56 m'),
(8, 8, 0, '11,36 m'),
(9, 8, 1, '12, 25 m'),
(10, 9, 1, 'Lentes biconvexas'),
(11, 9, 0, 'Lentes bicôncavas'),
(12, 9, 0, 'Espelhos côncavos'),
(13, 9, 0, 'Lentes planas e paralelas'),
(14, 10, 0, '200%'),
(15, 10, 1, '50%'),
(16, 10, 0, '30%'),
(17, 10, 0, '20%'),
(18, 11, 0, '30° e 45°'),
(19, 11, 1, '60° e 45°'),
(20, 11, 0, '45° e 45°'),
(21, 11, 0, '45° e 30°'),
(22, 12, 0, '340 m'),
(23, 12, 0, '816 m'),
(24, 12, 1, '408 m'),
(25, 12, 0, '240 m'),
(26, 13, 0, 'A razão desta PA é igual a 1/2'),
(27, 13, 0, 'O valor de X é negativo'),
(28, 13, 1, 'A soma dos três termos desta PA é igual a 3'),
(29, 13, 0, 'Impossível determinar a razão da PA'),
(30, 14, 1, '96 colares'),
(31, 14, 0, '108 colares'),
(32, 14, 0, '72 colares'),
(33, 14, 0, '88 colares'),
(34, 15, 0, '25 dias'),
(35, 15, 0, '30 dias'),
(36, 15, 0, '15 dias'),
(37, 15, 1, '20 dias'),
(38, 16, 1, '0,30'),
(39, 16, 0, '0,40'),
(40, 16, 0, '0,35'),
(41, 16, 0, '0,10'),
(42, 17, 0, '33%'),
(43, 17, 1, '66%'),
(44, 17, 0, '50%'),
(45, 17, 0, '46%'),
(46, 18, 0, 'Circunferência'),
(47, 18, 0, 'Parábola'),
(48, 18, 1, 'Hipérbole'),
(49, 18, 0, 'Elipse'),
(54, 24, 0, 'Alternativa 1'),
(55, 24, 1, 'Alternativa 2'),
(56, 24, 0, 'Alternativa 3'),
(57, 24, 0, 'Alternativa 4'),
(74, 29, 1, 'Blah'),
(75, 29, 0, 'Bleh'),
(76, 29, 0, 'Blih'),
(77, 29, 0, 'Bloh'),
(78, 30, 0, 'Blah'),
(79, 30, 1, 'Bleh'),
(80, 30, 0, 'Blih'),
(81, 30, 0, 'Bloh'),
(82, 31, 0, 'Blah'),
(83, 31, 0, 'Bleh'),
(84, 31, 1, 'Blih'),
(85, 31, 0, 'Bloh'),
(86, 32, 0, 'Blah'),
(87, 32, 0, 'Bleh'),
(88, 32, 0, 'Blih'),
(89, 32, 1, 'Bloh');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'Jaiminho', 'jaime_2001', 'j10'),
(2, 'Jussara', 'juss_2000', 'j10'),
(4, 'Jaspion', 'jasp_1000', 'j10'),
(5, 'Jandersson', 'jand_1000', 'j10'),
(6, 'João', 'joao', 'joao123'),
(7, 'Pedro', 'pedro', 'pedro123'),
(8, 'José', 'jose', 'jose123'),
(9, 'Maria', 'maria', 'maria123'),
(10, 'Ana', 'ana', 'ana123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_avaliacao`
--

CREATE TABLE `aluno_avaliacao` (
  `id` int(11) NOT NULL,
  `id_aluno_turma` int(11) NOT NULL,
  `id_turma_avaliacao` int(11) NOT NULL,
  `nota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_avaliacao`
--

INSERT INTO `aluno_avaliacao` (`id`, `id_aluno_turma`, `id_turma_avaliacao`, `nota`) VALUES
(1, 6, 1, 8),
(8, 6, 3, 6),
(12, 18, 8, 7.5),
(13, 18, 9, 5),
(14, 19, 8, 10),
(15, 22, 10, 2.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_turma`
--

CREATE TABLE `aluno_turma` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_turma`
--

INSERT INTO `aluno_turma` (`id`, `id_aluno`, `id_turma`) VALUES
(6, 1, 3),
(3, 1, 4),
(17, 5, 4),
(18, 6, 10),
(22, 6, 11),
(25, 6, 12),
(28, 6, 13),
(19, 7, 10),
(23, 7, 11),
(26, 7, 12),
(20, 8, 10),
(24, 8, 11),
(21, 9, 10),
(27, 10, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `disciplina` varchar(30) NOT NULL,
  `titulo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `disciplina`, `titulo`) VALUES
(3, 'COM220', 'P3'),
(4, 'COM220', 'P2'),
(5, 'COM110', 'P1'),
(6, 'COM110', 'Prova Substitutiva'),
(7, 'MAT015', 'P1'),
(11, 'MAT015', 'Prova Substitutiva'),
(12, 'COM250', 'P1'),
(13, 'COM250', 'P2'),
(14, 'COM222', 'P1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_questao`
--

CREATE TABLE `avaliacao_questao` (
  `id` int(11) NOT NULL,
  `id_avaliacao` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao_questao`
--

INSERT INTO `avaliacao_questao` (`id`, `id_avaliacao`, `id_questao`) VALUES
(17, 3, 9),
(20, 3, 10),
(21, 3, 11),
(4, 3, 13),
(18, 3, 18),
(24, 5, 7),
(25, 5, 8),
(26, 5, 9),
(27, 5, 10),
(28, 11, 18),
(29, 11, 24),
(39, 12, 29),
(40, 12, 30),
(41, 12, 31),
(42, 12, 32),
(43, 13, 7),
(44, 13, 8),
(45, 13, 9),
(46, 13, 10),
(47, 14, 29),
(48, 14, 30),
(49, 14, 31),
(50, 14, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cargaHoraria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`, `cargaHoraria`) VALUES
('COM110', 'Fundamentos de Programação', 36),
('COM110.2', 'Fundamentos de Programação', 36),
('COM111', 'Estrutura de Dados I', 48),
('COM112', 'Estrutura de Dados II', 64),
('COM210', 'Engenharia Software', 48),
('COM220', 'Orientada a Objetos I', 36),
('COM222', 'Desenvolvimento Web', 48),
('COM230', 'Banco de Dados', 48),
('COM250', 'Programação OO', 48),
('MAT015', 'Matemática Discreta', 48);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `login`, `senha`) VALUES
(2, 'Maria Julia', 'MJ_2000', 'mj10'),
(5, 'Pedro Paulo', 'PP_1000', 'pp10'),
(8, 'Josicleide', 'josi', '123'),
(9, 'Laércio', 'laercio', 'laercio123'),
(10, 'Melise', 'melise', 'melise123'),
(11, 'Adler', 'adler', 'adler123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `id` int(11) NOT NULL,
  `enunciado` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`id`, `enunciado`) VALUES
(7, 'Um corpo com massa de 30 kg é preso à extremidade de uma mola com uma constante elástica de 300 N/m e massa desprezível, enquanto a outra extremidade da mola é fixada a um suporte no topo de uma rampa. O corpo deve permanecer em equilíbrio ao longo dessa rampa inclinada de 30°, a elongação da mola, considerando a força de atrito entre o corpo e a superfície da rampa de 150 N, é de:'),
(8, 'Durante os treinos de salto em distância, o atleta deverá saltar uma distância mínima de 10,0 m para  se  classificar  para  as  competições  entre  repúblicas  no  Inatel  (Instituto  Nacional  de Telecomunicações), em Santa Rita do Sapucaí, MG. Um atleta com massa de 90 kg durante os treinos adquiriu uma energia cinética de 540 J para a execução de seu salto. O atleta saltou em um  ângulo  de  45°  em  relação  à  pista  e  a  duração  de seu  salto  foi  de  5,00  s.  Seu  salto  foi considerado válido e a marca atingida, aproximadamente, foi de:'),
(9, 'João foi ao Oftalmologista e este detectou um defeito da visão chamado Hipermetropia. O tipo de lente indicado para correção deste defeito é o de:'),
(10, 'O consumo total de energia de uma residência típica brasileira, em um período de 30 dias, é de 300 kWh. Esta residência tem um chuveiro que apresenta uma potência elétrica de 5000 W e que fica  ligado  em  média  60  minutos  por  dia.  Determine o  percentual  da  energia  consumida  pelo chuveiro em relação ao consumo total da energia consumida na residência:'),
(11, 'Quando um raio luminoso atravessa um prisma de ângulo de refringência de 90º, seu desvio mínimo vale 30º. Nestas condições, qual alternativa apresenta, respectivamente, o ângulo de incidência e o ângulo de refração na primeira face do prisma?'),
(12, 'O eco de um som é percebido na posição do emissor do som 2,4 segundos após o som ter sido emitido. Se considerarmos a velocidade do som no ar como 340 m/s, qual deverá ser a distância entre o emissor do som e o obstáculo de reflexão?'),
(13, 'Numa progressão aritmética (PA), os três primeiros termos são definidos por (X+4, 2X, X-3). Podemos afirmar que:'),
(14, 'Uma  empresa,  que  opera  no  comércio  eletrônico  na  internet,  comercializa  colares.  O  setor  de manufatura da empresa possui capacidade para entregar em 16 dias, 320 colares de 1,20 m cada um.  Mantendo-se  as  condições  de  produção,  assinale a  alternativa  que  apresenta  o  número  de colares de 1,25 m que podem ser entregues em 5 dias. '),
(15, 'Uma  empresa  de  logística,  no  estado  de  Minas  Gerais,  financiou  120  caminhões  novos  para transportar materiais de construção. A empresa que vendeu os caminhões informou que para essa frota transportar os materiais de construção em uma distância de 3000 km, com velocidade média de 60 km/h, gasta 10 dias. Assinale a alternativa que apresenta a quantidade de dias que a frota nova gastará, considerando as mesmas condições, para percorrer 4500 km com uma velocidade média de 45 km/h:'),
(16, 'Considere uma autoescola na qual 25% dos alunos foram reprovados no teste psicotécnico, 15% no teste de direção e 10% no teste psicotécnico e de direção ao mesmo tempo. Se um estudante é selecionado  aleatoriamente,  assinale  a  alternativa que  mostra  a  probabilidade  de  ele  ter  sido reprovado no teste psicotécnico ou de direção'),
(17, 'Um grupo é formado por homens e mulheres, totalizando 1500 pessoas. Cada pessoa deste grupo fala apenas uma língua estrangeira (Inglês ou Francês ou Espanhol). Isto significa que não existem neste grupo pessoas que falam duas ou até três línguas estrangeiras. O grupo é composto por 60% de homens, 70% dos homens falam Inglês, 25% das mulheres falam Espanhol. Ainda existem 180 homens que falam Espanhol e 180 pessoas falam Francês. Assinale a alternativa que apresenta a probabilidade de encontrar neste grupo uma pessoa que fala Inglês.'),
(18, 'A equação y² - 2x² - 2y - 8x = 11 descreve uma:'),
(24, 'Teste'),
(29, 'Questão A'),
(30, 'Questão B'),
(31, 'Questão C'),
(32, 'Questão D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_disciplina` varchar(10) NOT NULL,
  `ano_periodo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `id_professor`, `id_disciplina`, `ano_periodo`) VALUES
(3, 2, 'COM220', '2019.1'),
(4, 5, 'MAT015', '2019.1'),
(11, 9, 'COM222', '2019.1'),
(10, 9, 'COM250', '2019.1'),
(12, 10, 'COM230', '2019.1'),
(13, 11, 'COM210', '2019.1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_avaliacao`
--

CREATE TABLE `turma_avaliacao` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_avaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma_avaliacao`
--

INSERT INTO `turma_avaliacao` (`id`, `id_turma`, `id_avaliacao`) VALUES
(3, 3, 3),
(1, 3, 4),
(4, 4, 7),
(8, 10, 12),
(9, 10, 13),
(10, 11, 14);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alternativa_questao`
--
ALTER TABLE `alternativa_questao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_questao` (`id_questao`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices para tabela `aluno_avaliacao`
--
ALTER TABLE `aluno_avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_aluno_turma_2` (`id_aluno_turma`,`id_turma_avaliacao`),
  ADD KEY `id_aluno_turma` (`id_aluno_turma`,`id_turma_avaliacao`),
  ADD KEY `aluno_avaliacao_ibfk_2` (`id_turma_avaliacao`);

--
-- Índices para tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_aluno_2` (`id_aluno`,`id_turma`),
  ADD KEY `id_turma` (`id_turma`),
  ADD KEY `id_aluno` (`id_aluno`) USING BTREE;

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplina` (`disciplina`);

--
-- Índices para tabela `avaliacao_questao`
--
ALTER TABLE `avaliacao_questao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_avaliacao` (`id_avaliacao`,`id_questao`) USING BTREE,
  ADD KEY `avaliacao_questao_ibfk_2` (`id_questao`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices para tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professor` (`id_professor`,`id_disciplina`,`ano_periodo`),
  ADD KEY `id_disciplina` (`id_disciplina`);

--
-- Índices para tabela `turma_avaliacao`
--
ALTER TABLE `turma_avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_turma` (`id_turma`,`id_avaliacao`) USING BTREE,
  ADD KEY `turma_avaliacao_ibfk_2` (`id_avaliacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alternativa_questao`
--
ALTER TABLE `alternativa_questao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `aluno_avaliacao`
--
ALTER TABLE `aluno_avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `avaliacao_questao`
--
ALTER TABLE `avaliacao_questao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `turma_avaliacao`
--
ALTER TABLE `turma_avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alternativa_questao`
--
ALTER TABLE `alternativa_questao`
  ADD CONSTRAINT `alternativa_questao_ibfk_1` FOREIGN KEY (`id_questao`) REFERENCES `questao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aluno_avaliacao`
--
ALTER TABLE `aluno_avaliacao`
  ADD CONSTRAINT `aluno_avaliacao_ibfk_1` FOREIGN KEY (`id_aluno_turma`) REFERENCES `aluno_turma` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `aluno_avaliacao_ibfk_2` FOREIGN KEY (`id_turma_avaliacao`) REFERENCES `turma_avaliacao` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `Aluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aluno_turma_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`id`);

--
-- Limitadores para a tabela `avaliacao_questao`
--
ALTER TABLE `avaliacao_questao`
  ADD CONSTRAINT `avaliacao_questao_ibfk_1` FOREIGN KEY (`id_avaliacao`) REFERENCES `avaliacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao_questao_ibfk_2` FOREIGN KEY (`id_questao`) REFERENCES `questao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma_avaliacao`
--
ALTER TABLE `turma_avaliacao`
  ADD CONSTRAINT `turma_avaliacao_ibfk_1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_avaliacao_ibfk_2` FOREIGN KEY (`id_avaliacao`) REFERENCES `avaliacao` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
