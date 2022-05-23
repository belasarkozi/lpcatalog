<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220521084235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kiado (id INT AUTO_INCREMENT NOT NULL, nev VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lemez (id INT AUTO_INCREMENT NOT NULL, kiado_id INT NOT NULL, nev VARCHAR(100) NOT NULL, kiadasi_datum DATE NOT NULL, INDEX IDX_7E4D35D3A3D29CB7 (kiado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lemez_szerzo (lemez_id INT NOT NULL, szerzo_id INT NOT NULL, INDEX IDX_C06A530A43D2B1BC (lemez_id), INDEX IDX_C06A530AC4F4AA77 (szerzo_id), PRIMARY KEY(lemez_id, szerzo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE szerzo (id INT AUTO_INCREMENT NOT NULL, nev VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lemez ADD CONSTRAINT FK_7E4D35D3A3D29CB7 FOREIGN KEY (kiado_id) REFERENCES kiado (id)');
        $this->addSql('ALTER TABLE lemez_szerzo ADD CONSTRAINT FK_C06A530A43D2B1BC FOREIGN KEY (lemez_id) REFERENCES lemez (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lemez_szerzo ADD CONSTRAINT FK_C06A530AC4F4AA77 FOREIGN KEY (szerzo_id) REFERENCES szerzo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lemez DROP FOREIGN KEY FK_7E4D35D3A3D29CB7');
        $this->addSql('ALTER TABLE lemez_szerzo DROP FOREIGN KEY FK_C06A530A43D2B1BC');
        $this->addSql('ALTER TABLE lemez_szerzo DROP FOREIGN KEY FK_C06A530AC4F4AA77');
        $this->addSql('DROP TABLE kiado');
        $this->addSql('DROP TABLE lemez');
        $this->addSql('DROP TABLE lemez_szerzo');
        $this->addSql('DROP TABLE szerzo');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
