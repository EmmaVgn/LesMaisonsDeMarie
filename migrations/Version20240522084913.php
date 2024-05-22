<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240522084913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE criteria (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE equipment ADD criteria_id INT DEFAULT NULL, DROP image_name, DROP update_at');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id)');
        $this->addSql('CREATE INDEX IDX_D338D583990BEA15 ON equipment (criteria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE criteria');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583990BEA15');
        $this->addSql('DROP INDEX IDX_D338D583990BEA15 ON equipment');
        $this->addSql('ALTER TABLE equipment ADD image_name VARCHAR(255) NOT NULL, ADD update_at DATETIME NOT NULL, DROP criteria_id');
    }
}
