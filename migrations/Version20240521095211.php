<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521095211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, update_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE equipment_ad (equipment_id INT NOT NULL, ad_id INT NOT NULL, INDEX IDX_99A663F6517FE9FE (equipment_id), INDEX IDX_99A663F64F34D596 (ad_id), PRIMARY KEY(equipment_id, ad_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE equipment_ad ADD CONSTRAINT FK_99A663F6517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment_ad ADD CONSTRAINT FK_99A663F64F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment_ad DROP FOREIGN KEY FK_99A663F6517FE9FE');
        $this->addSql('ALTER TABLE equipment_ad DROP FOREIGN KEY FK_99A663F64F34D596');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE equipment_ad');
    }
}
