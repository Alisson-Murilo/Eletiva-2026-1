-- CREATE SCHEMA IF NOT EXISTS `lavanderia` DEFAULT CHARACTER SET utf8mb4;
-- USE `lavanderia`;

CREATE TABLE IF NOT EXISTS`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cliente` (
  `id`            INT          NOT NULL AUTO_INCREMENT,
  `nome`          VARCHAR(100) NOT NULL,
  `cpf`           VARCHAR(14)  NOT NULL,
  `telefone`      VARCHAR(20)  NULL,
  `email`         VARCHAR(100) NULL,
  `endereco`      VARCHAR(255) NULL,
  `data_inclusao` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_cpf` (`cpf`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `tipo_servico` (
  `id`         INT           NOT NULL AUTO_INCREMENT,
  `descricao`  VARCHAR(255)  NOT NULL,
  `preco_base` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `itens` (
  `id`        INT          NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id`          INT           NOT NULL AUTO_INCREMENT,
  `data_pedido` DATE          NOT NULL DEFAULT (CURRENT_DATE),
  `status`      VARCHAR(45)   NOT NULL DEFAULT 'recebido',
  `total`       DECIMAL(10,2) NULL DEFAULT 0.00,
  `cliente_id`  INT           NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pedidos_cliente_idx` (`cliente_id`),
  CONSTRAINT `fk_pedidos_cliente`
    FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `itens_do_pedido` (
  `id`              INT           NOT NULL AUTO_INCREMENT,
  `itens_id`        INT           NOT NULL,
  `pedidos_id`      INT           NOT NULL,
  `tipo_servico_id` INT           NOT NULL,
  `quantidade`      INT           NOT NULL DEFAULT 1,
  `preco_unitario`  DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_ip_itens`
    FOREIGN KEY (`itens_id`)        REFERENCES `itens` (`id`),
  CONSTRAINT `fk_ip_pedidos`
    FOREIGN KEY (`pedidos_id`)      REFERENCES `pedidos` (`id`),
  CONSTRAINT `fk_ip_tipo_servico`
    FOREIGN KEY (`tipo_servico_id`) REFERENCES `tipo_servico` (`id`)
) ENGINE = InnoDB;