
-- Drop Database:
DROP DATABASE
	IF EXISTS `tincphpdb01`;

-- --------------------------------------------------------

-- Database: 
CREATE DATABASE
	IF NOT EXISTS `tincphpdb01`
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
    
USE `tincphpdb01`;

-- --------------------------------------------------------
-- Estrutura da tabela `produtos`
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `resumo` varchar(1000) DEFAULT NULL,
  `valor` decimal(9,2) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `destaque` BIT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Extraindo dados da tabela `produtos`
INSERT INTO `produtos` (`id`, `tipo_id`, `descricao`, `resumo`, `valor`, `imagem`, `destaque`) VALUES
(1, 1, 'Picanha ao alho', ' Esta e a combinação do sabor inconfundível da picanha com o aroma acentuado do alho. Condimento que casa perfeitamente com este corte nobre', 49.90, 'picanha_alho.jpg', 1),
(2, 1, 'Fraldinha', 'Uma das carnes mais suculentas do cardápio. Requintada, com maciez particular e pouca gordura, e uma carne que chama atenção pela sua textura', 29.90, 'fraldinha.jpg', 0),
(3, 1, 'Costela', 'A mais procurada! Feita na churrasqueira ou ao fogo de chão, e preparada por mais de 08 horas para atingir o ponto ideal e torna-la a referência de nossa churrascaria', 39.90, 'costelona.jpg', 1),
(4, 1, 'Cupim', 'Uma referência especial dos paulistas. Bastante gordurosa e macia, o cupim e uma carne fibrosa, que se desfia quando bem preparada ', 47.90, 'cupim.jpg', 1),
(5, 1, 'Picanha ', 'Considerada por muitos como a mais nobre e procurada carne de churrasco, a picanha pode ser servida ao ponto , mal passada ou bem passada. Suculenta e com sua característica capa de gordura', 72.90, 'picanha_sem.jpg', 0),
(6, 1, 'Apfelstrudel', 'Sobremesa tradicional austro-germânica e um delicioso folhado de maça e canela com sorvete', 12.60, 'strudel.jpg', 0),
(7, 1, 'Alcatra', 'Carne com muitas fibras, porém macia. Sua lateral apresenta uma boa parcela de gordura. Equilibrando de forma harmônica maciez e fibras.', 36.28, 'alcatra_pedra.jpg', 0),
(8, 1, 'Maminha', 'Vem da parte inferior da Alcatra. E uma carne com fibras, porém macia e saborosa.', 31.90, 'maminha.jpg', 0),
(9, 2, 'Abacaxii', 'Abacaxi assado com canela ao creme de leite condensado ', 16.95, 'abacaxi.jpg', 0);

-- Indexes for table `produtos`
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `produtos`
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- Estrutura para tabela `tipos`
CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `rotulo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Despejando dados para a tabela `tipos`
INSERT INTO `tipos` (`id`, `sigla`, `rotulo`) VALUES
(1, 'chu', 'Churrasco'),
(2, 'sob', 'Sobremesa');

-- Índices de tabela `tipos`
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabela `tipos`
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  
-- Estrutura para tabela `niveis`
CREATE TABLE `niveis` (
  `id` int(11) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `rotulo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Despejando dados para a tabela `niveis`
INSERT INTO `niveis` (`id`, `sigla`, `rotulo`) VALUES
(1, 'sup', 'Super'),
(2, 'com', 'Comum'),
(3, 'cli', 'Cliente');

-- Índices de tabela `niveis`
ALTER TABLE `niveis`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabela `niveis`
ALTER TABLE `niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Estrutura para tabela `usuarios`
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `ativo` BIT NOT NULL DEFAULT 1,
  `nivel_id` INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserindo Dados na Tabela `usuarios'
INSERT INTO `usuarios` 
	(`id`, `login`, `senha`, `nivel_id`) 
	VALUES
		(1, 'senac', md5('1234'), 1),
		(2, 'joao', md5('456'), 2),
		(3, 'maria', md5('789'), 2),
		(4, 'well', md5('1234'), 1);

-- Índices de tabela `usuarios`
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_uniq`(`login`),
  ADD FOREIGN KEY (`nivel_id`) REFERENCES niveis(`id`);

-- AUTO_INCREMENT de tabela `usuarios`
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  
-- Estrutura para tabela `usuarios`
CREATE TABLE `clientes` (
  	id INT(11) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    cpf char(11) NOT NULL, 
    email VARCHAR(255) NOT NULL,
    usuario_id INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Índices de tabela `clientes`
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY (`cpf`),
  ADD UNIQUE KEY (`email`),
  ADD FOREIGN KEY (`usuario_id`) REFERENCES usuarios(`id`);

-- AUTO_INCREMENT de tabela `clientes`
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  
-- Estrutura para tabela `mesas`
CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `numero` varchar(3) NOT NULL,
  `capacidade` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Índices de tabela `mesas`
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabela `mesas`
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
    
-- Estrutura para tabela `status`
CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `rotulo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Índices de tabela `status`
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabela `status`
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  
INSERT INTO `tincphpdb01`.`status` (`id`, `sigla`, `rotulo`) VALUES ('1', 'AND', 'Andamento');
INSERT INTO `tincphpdb01`.`status` (`id`, `sigla`, `rotulo`) VALUES ('2', 'APR', 'Aprovado');
INSERT INTO `tincphpdb01`.`status` (`id`, `sigla`, `rotulo`) VALUES ('3', 'CAN', 'Cancelado');
INSERT INTO `tincphpdb01`.`status` (`id`, `sigla`, `rotulo`) VALUES ('4', 'EXP', 'Expirado');
    
-- Estrutura para tabela `reservas`
CREATE TABLE `reservas` (
  	id INT(11) NOT NULL,
    dia datetime NOT NULL,
    hora_inicio time NOT NULL, 
    hora_fim time NOT NULL,
    numero_pessoas TINYINT(3) NOT NULL, 
    motivo_reserva VARCHAR(100) NULL,
    ativo BIT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Índices de tabela `reservas`
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabela `reservas`
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
    
-- Estrutura para tabela `cliente_reserva`
CREATE TABLE `cliente_reserva` (
  	id INT(11) NOT NULL,
    cliente_id INT(11) NOT NULL,
    reserva_id INT(11) NOT NULL,
    status_id INT(11) NOT NULL,
    mesa_id INT(11) NULL,
    motivo_cancelamento VARCHAR(150) NULL,
    numero_reserva VARCHAR(10) NULL,
    data_reserva_feita TIMESTAMP NOT NULL DEFAULT  CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Índices de tabela `cliente_reserva`
ALTER TABLE `cliente_reserva`
  ADD PRIMARY KEY (`id`),
  ADD FOREIGN KEY (`cliente_id`) REFERENCES clientes(`id`),
  ADD FOREIGN KEY (`reserva_id`) REFERENCES reservas(`id`),
  ADD FOREIGN KEY (`status_id`) REFERENCES `status`(`id`),
  ADD FOREIGN KEY (`mesa_id`) REFERENCES mesas(`id`);

-- AUTO_INCREMENT de tabela `cliente_reserva`
ALTER TABLE `cliente_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  
-- Chave estrangeira
ALTER TABLE `produtos`
  ADD CONSTRAINT `tipo_id_fk` FOREIGN KEY (`tipo_id`)
	REFERENCES `tipos`(`id`)
    ON DELETE no action
    ON UPDATE no action;  
    
-- Criando a view vw_produtos
CREATE VIEW vw_produtos AS
	SELECT	p.id,
			p.tipo_id,
            t.sigla,
            t.rotulo,
            p.descricao,
            p.resumo,
            p.valor,
            p.imagem,
            p.destaque
    FROM produtos p
		JOIN tipos t
	WHERE p.tipo_id=t.id;
COMMIT;

-- Criando a view vw_reservas
CREATE VIEW `vw_reservas` AS
SELECT 
  cr.id AS cliente_reserva_id,
  cl.id AS id_do_cliente,
  cl.nome,
  cl.cpf,
  cl.email,
  re.id AS id_da_reserva,
  re.dia,
  re.hora_inicio,
  re.hora_fim,
  re.numero_pessoas,
  re.motivo_reserva,
  st.sigla AS status_sigla,
  st.rotulo AS status_rotulo,
  me.id AS id_da_mesa,
  me.numero AS mesa_numero,
  me.capacidade AS mesa_capacidade,
  cr.motivo_cancelamento,
  cr.numero_reserva
FROM cliente_reserva cr
  JOIN clientes cl ON cr.cliente_id = cl.id
  JOIN reservas re ON cr.reserva_id = re.id
  JOIN `status` st ON cr.status_id = st.id
  LEFT JOIN mesas me ON cr.mesa_id = me.id;

-- Criando a view vw_clientes
CREATE VIEW `vw_clientes` AS
	SELECT cl.id as cliente_id,
		   cl.nome, 
		   cl.cpf, 
           cl.email, 
           us.id as usuario_id,
           us.login, 
           us.senha, 
           us.ativo,
           ni.sigla, 
           ni.rotulo 
	FROM usuarios us 
		JOIN clientes cl ON us.id = cl.usuario_id
	JOIN niveis ni ON us.nivel_id = ni.id;
COMMIT;

-- -- atualizar para expirado apos um dia

-- -- ver se a reserva esta entre 1 e 45 dias de antecedencia
-- DELIMITER $
-- CREATE TRIGGER trg_verificar_antecedencia
-- BEFORE INSERT ON reservas
-- FOR EACH ROW
-- BEGIN
--     IF (NEW.dia < (CURDATE() + INTERVAL 1 DAY)) OR (NEW.dia > (CURDATE() + INTERVAL 45 DAY)) THEN
--         SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Antecedência inválida';
--     END IF;
-- END$
-- DELIMITER ;

-- -- ver se o cliente ja tem uma reserva no mesmo dia
-- DELIMITER $
-- CREATE TRIGGER trg_verificar_limite_reservas
-- BEFORE INSERT ON cliente_reserva
-- FOR EACH ROW
-- BEGIN
--     IF EXISTS (
--         SELECT *
--         FROM reservas r
--         JOIN cliente_reserva cr ON r.id = cr.reserva_id
--         WHERE cr.cliente_id = NEW.cliente_id
--         AND r.dia = NEW.cr.data_reserva
--         AND r.cpf = (SELECT cpf FROM clientes WHERE id = NEW.cliente_id)
--     ) THEN
--         SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Limite de reservas por dia excedido';
--     END IF;
-- END $
-- DELIMITER ;