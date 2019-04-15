<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415133150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE personne_personne (personne_source INT NOT NULL, personne_target INT NOT NULL, INDEX IDX_CC1CC8AA6BF0479E (personne_source), INDEX IDX_CC1CC8AA72151711 (personne_target), PRIMARY KEY(personne_source, personne_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personne_personne ADD CONSTRAINT FK_CC1CC8AA6BF0479E FOREIGN KEY (personne_source) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne_personne ADD CONSTRAINT FK_CC1CC8AA72151711 FOREIGN KEY (personne_target) REFERENCES personne (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE personne_personne');
    }
}
