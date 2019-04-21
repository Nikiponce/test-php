<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190420233659 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ad (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, status VARCHAR(15) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE component (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, ad_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, link VARCHAR(255) DEFAULT NULL, format VARCHAR(5) DEFAULT NULL, size VARCHAR(20) DEFAULT NULL, text VARCHAR(140) DEFAULT NULL, x_axis INT NOT NULL, y_axis INT NOT NULL, z_axis INT NOT NULL, width INT NOT NULL, height INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_49FEA157C54C8C93 (type_id), INDEX IDX_49FEA1574F34D596 (ad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE component ADD CONSTRAINT FK_49FEA157C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE component ADD CONSTRAINT FK_49FEA1574F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE component DROP FOREIGN KEY FK_49FEA1574F34D596');
        $this->addSql('ALTER TABLE component DROP FOREIGN KEY FK_49FEA157C54C8C93');
        $this->addSql('DROP TABLE ad');
        $this->addSql('DROP TABLE component');
        $this->addSql('DROP TABLE type');
    }
}
