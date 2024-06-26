<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240620174054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, zip VARCHAR(10) NOT NULL, state VARCHAR(255) NOT NULL, town VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE client (id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, name VARCHAR(50) NOT NULL, surname VARCHAR(50) NOT NULL, age INT NOT NULL, ssn VARCHAR(32) NOT NULL, fico VARCHAR(3) NOT NULL, income INT NOT NULL, email VARCHAR(50) NOT NULL, phone VARCHAR(50) NOT NULL, address_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C7440455F5B7AF75 ON client (address_id)');
        $this->addSql('CREATE INDEX IDX_C7440455BF396750 ON client (id)');
        $this->addSql('CREATE TABLE credit (id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, name VARCHAR(50) NOT NULL, term INT NOT NULL, rate DOUBLE PRECISION NOT NULL, sum DOUBLE PRECISION NOT NULL, client_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1CC16EFE19EB6921 ON credit (client_id)');
        $this->addSql('CREATE INDEX IDX_1CC16EFEBF396750 ON credit (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT FK_1CC16EFE19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE client DROP CONSTRAINT FK_C7440455F5B7AF75');
        $this->addSql('ALTER TABLE credit DROP CONSTRAINT FK_1CC16EFE19EB6921');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE credit');
    }
}
