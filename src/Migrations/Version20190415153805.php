<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415153805 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_association (id INT AUTO_INCREMENT NOT NULL, association_id INT DEFAULT NULL, label VARCHAR(255) DEFAULT NULL, INDEX IDX_B69CF65DEFB9C8A5 (association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE type_association ADD CONSTRAINT FK_B69CF65DEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('DROP TABLE personne_personne');
        $this->addSql('ALTER TABLE personne ADD avoir_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFC36D46DB FOREIGN KEY (avoir_id) REFERENCES association (id)');
        $this->addSql('CREATE INDEX IDX_FCEC9EFC36D46DB ON personne (avoir_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFC36D46DB');
        $this->addSql('ALTER TABLE type_association DROP FOREIGN KEY FK_B69CF65DEFB9C8A5');
        $this->addSql('CREATE TABLE personne_personne (personne_source INT NOT NULL, personne_target INT NOT NULL, INDEX IDX_CC1CC8AA6BF0479E (personne_source), INDEX IDX_CC1CC8AA72151711 (personne_target), PRIMARY KEY(personne_source, personne_target)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE personne_personne ADD CONSTRAINT FK_CC1CC8AA6BF0479E FOREIGN KEY (personne_source) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne_personne ADD CONSTRAINT FK_CC1CC8AA72151711 FOREIGN KEY (personne_target) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE type_association');
        $this->addSql('DROP INDEX IDX_FCEC9EFC36D46DB ON personne');
        $this->addSql('ALTER TABLE personne DROP avoir_id');
    }
}
