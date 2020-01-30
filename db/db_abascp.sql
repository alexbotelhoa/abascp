-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jan-2020 às 14:38
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_abascp`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_late_update` (`pidproject` INT(11))  BEGIN
  
    DECLARE vstproject INT;
    
	SELECT IF (a.dtfinish >= max(b.dtfinish), 0, 1) INTO vstproject
	FROM tb_projects a 
	INNER JOIN tb_tasks b USING(idproject)
    WHERE a.idproject = pidproject
	GROUP BY a.idproject;
    
    UPDATE tb_projects
    SET stproject = vstproject
	WHERE idproject = pidproject;
     
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_projects_save` (`pidproject` INT(11), `pdesproject` VARCHAR(128), `pdtstart` TIMESTAMP, `pdtfinish` TIMESTAMP, `prtproject` TINYINT, `pstproject` TINYINT)  BEGIN
	
	IF pidproject > 0 THEN
		
		UPDATE tb_projects
        SET 
			desproject = pdesproject,
            dtstart = pdtstart,
            dtfinish = pdtfinish,
            rtproject = prtproject,
            stproject = pstproject
        WHERE idproject = pidproject;
        
    ELSE
		
		INSERT INTO tb_projects (desproject, dtstart, dtfinish, rtproject, stproject) 
        VALUES(pdesproject, pdtstart, pdtfinish, 0, 0);
        
        SET pidproject = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_projects WHERE idproject = pidproject;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_rate_update` (`pidproject` INT(11), `prtproject` TINYINT)  BEGIN

	UPDATE tb_projects
	SET rtproject = prtproject
	WHERE idproject = pidproject;
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tasks_save` (`pidtask` INT(11), `pidproject` INT(11), `pdestask` VARCHAR(128), `pdtstart` TIMESTAMP, `pdtfinish` TIMESTAMP, `psttask` TINYINT)  BEGIN
	
	IF pidtask > 0 THEN
		
		UPDATE tb_tasks
        SET 
			idproject = pidproject,
            destask = pdestask,
            dtstart = pdtstart,
            dtfinish = pdtfinish,
            sttask = psttask
        WHERE idtask = pidtask;
        
    ELSE
		
		INSERT INTO tb_tasks (idproject, destask, dtstart, dtfinish, sttask) 
        VALUES(pidproject, pdestask, pdtstart, pdtfinish, 0);
        
        SET pidtask = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_tasks WHERE idtask = pidtask;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_projects`
--

CREATE TABLE `tb_projects` (
  `idproject` int(11) NOT NULL,
  `desproject` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `dtstart` timestamp NULL DEFAULT NULL,
  `dtfinish` timestamp NULL DEFAULT NULL,
  `rtproject` tinyint(4) DEFAULT 0,
  `stproject` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_projects`
--

INSERT INTO `tb_projects` (`idproject`, `desproject`, `dtstart`, `dtfinish`, `rtproject`, `stproject`) VALUES
(1, 'Projeto 1', '2019-01-01 03:00:00', '2019-01-31 03:00:00', 50, 0),
(2, 'Projeto 2', '2019-02-01 03:00:00', '2019-02-28 03:00:00', 0, 1),
(3, 'Projeto 3', '2020-01-01 03:00:00', '2020-04-01 03:00:00', 50, 0),
(4, 'Projeto 4', '2019-01-01 03:00:00', '2025-05-01 03:00:00', 50, 0),
(5, 'Projeto 5', '2020-01-01 03:00:00', '2020-06-01 03:00:00', 67, 0),
(6, 'Projeto 6', '2020-01-01 03:00:00', '2020-06-01 03:00:00', 0, 0),
(7, 'Projeto 7', '2020-01-01 03:00:00', '2020-06-01 03:00:00', 100, 0),
(8, 'Projeto 8', '2020-01-01 03:00:00', '2020-06-01 03:00:00', 0, 0),
(9, 'Projeto 9', '2020-01-01 03:00:00', '2020-06-01 03:00:00', 0, 0),
(11, 'Projeto 11', '2020-06-05 03:00:00', '2020-07-06 03:00:00', 0, 0),
(14, 'Projeto 14', '2020-01-01 03:00:00', '2020-01-01 03:00:00', 0, NULL),
(15, 'Projeto 15', '2020-01-01 03:00:00', '2020-01-01 03:00:00', 67, 1),
(17, 'Final 2', '2020-01-01 03:00:00', '2020-01-01 03:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tasks`
--

CREATE TABLE `tb_tasks` (
  `idtask` int(11) NOT NULL,
  `idproject` int(11) NOT NULL,
  `destask` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `dtstart` timestamp NULL DEFAULT NULL,
  `dtfinish` timestamp NULL DEFAULT NULL,
  `sttask` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tasks`
--

INSERT INTO `tb_tasks` (`idtask`, `idproject`, `destask`, `dtstart`, `dtfinish`, `sttask`) VALUES
(1, 7, 'Tarefa 1', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 1),
(2, 4, 'Tarefa 2', '2020-01-01 03:00:00', '2020-06-01 03:00:00', 1),
(3, 4, 'Tarefa 3', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 0),
(4, 4, 'Tarefa 4', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 0),
(5, 5, 'Tarefa 5', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 1),
(6, 6, 'Tarefa 6', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 0),
(7, 5, 'Tarefa 7', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 0),
(8, 6, 'Tarefa 8', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 0),
(9, 5, 'Tarefa 9', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 1),
(10, 3, 'Tarefa 10', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 1),
(11, 4, 'Tarefa 11', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 1),
(12, 3, 'Tarefa 12', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 0),
(13, 6, 'Tarefa 13', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 0),
(14, 1, 'Tarefa 14', '2019-01-06 03:00:00', '2019-01-15 03:00:00', 1),
(15, 15, 'Tarefa 15', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 1),
(16, 9, 'Tarefa 16', '2020-01-01 03:00:00', '2020-02-10 03:00:00', 0),
(18, 2, 'Tarefa 18', '2019-02-01 03:00:00', '2019-02-10 03:00:00', 0),
(19, 2, 'Tarefa 19', '2019-02-11 03:00:00', '2019-02-20 03:00:00', 0),
(20, 2, 'Tarefa 20', '2019-02-21 03:00:00', '2019-03-02 03:00:00', 0),
(21, 1, 'Tarefa 21', '2019-01-16 03:00:00', '2019-01-31 03:00:00', 0),
(22, 15, 'Tarefa 22', '2020-01-01 03:00:00', '2020-01-01 03:00:00', 1),
(23, 15, 'Tarefa 23', '2020-01-01 03:00:00', '2020-01-01 03:00:00', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_projects`
--
ALTER TABLE `tb_projects`
  ADD PRIMARY KEY (`idproject`);

--
-- Índices para tabela `tb_tasks`
--
ALTER TABLE `tb_tasks`
  ADD PRIMARY KEY (`idtask`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_projects`
--
ALTER TABLE `tb_projects`
  MODIFY `idproject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_tasks`
--
ALTER TABLE `tb_tasks`
  MODIFY `idtask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
