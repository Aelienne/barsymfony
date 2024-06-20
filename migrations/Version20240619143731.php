<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619143731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, artist_category_id INT NOT NULL, nickname VARCHAR(255) NOT NULL, picture LONGTEXT NOT NULL, description VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1599687A188FE64 (nickname), UNIQUE INDEX UNIQ_1599687444F97DD (phone), UNIQUE INDEX UNIQ_1599687E7927C74 (email), INDEX IDX_15996873B7C2BA5 (artist_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist_bar (artist_id INT NOT NULL, bar_id INT NOT NULL, INDEX IDX_AEFA091BB7970CF8 (artist_id), INDEX IDX_AEFA091B89A253A (bar_id), PRIMARY KEY(artist_id, bar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture LONGTEXT NOT NULL, description VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, adress VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_76FF8CAAE7927C74 (email), UNIQUE INDEX UNIQ_76FF8CAA444F97DD (phone), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_15996873B7C2BA5 FOREIGN KEY (artist_category_id) REFERENCES artiste_category (id)');
        $this->addSql('ALTER TABLE artist_bar ADD CONSTRAINT FK_AEFA091BB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_bar ADD CONSTRAINT FK_AEFA091B89A253A FOREIGN KEY (bar_id) REFERENCES bar (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_15996873B7C2BA5');
        $this->addSql('ALTER TABLE artist_bar DROP FOREIGN KEY FK_AEFA091BB7970CF8');
        $this->addSql('ALTER TABLE artist_bar DROP FOREIGN KEY FK_AEFA091B89A253A');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE artist_bar');
        $this->addSql('DROP TABLE artiste_category');
        $this->addSql('DROP TABLE bar');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
