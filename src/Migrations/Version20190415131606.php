<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415131606 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fait_notable_place (fait_notable_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_DEDF6EE6268032F5 (fait_notable_id), INDEX IDX_DEDF6EE6DA6A219 (place_id), PRIMARY KEY(fait_notable_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fait_notable_place ADD CONSTRAINT FK_DEDF6EE6268032F5 FOREIGN KEY (fait_notable_id) REFERENCES fait_notable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fait_notable_place ADD CONSTRAINT FK_DEDF6EE6DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE fait_notable_place');
    }
}
