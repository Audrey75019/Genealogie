<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190419121057 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE personne_monument (personne_id INT NOT NULL, monument_id INT NOT NULL, INDEX IDX_B86A83C6A21BD112 (personne_id), INDEX IDX_B86A83C6493DA1E5 (monument_id), PRIMARY KEY(personne_id, monument_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monument (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, code_postal INT NOT NULL, guerre VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personne_monument ADD CONSTRAINT FK_B86A83C6A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne_monument ADD CONSTRAINT FK_B86A83C6493DA1E5 FOREIGN KEY (monument_id) REFERENCES monument (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sepulture ADD number INT NOT NULL, ADD cimetiere_nom VARCHAR(255) NOT NULL, ADD code_postal INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE personne_monument DROP FOREIGN KEY FK_B86A83C6493DA1E5');
        $this->addSql('DROP TABLE personne_monument');
        $this->addSql('DROP TABLE monument');
        $this->addSql('ALTER TABLE sepulture DROP number, DROP cimetiere_nom, DROP code_postal');
    }
}
