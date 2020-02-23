<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200216180052 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE data_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE method (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parameter (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, validation_rule VARCHAR(255) DEFAULT NULL, position INT NOT NULL, INDEX IDX_2A979110C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE returned_datas_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route (id INT AUTO_INCREMENT NOT NULL, returned_datas_type_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, returned_datas LONGTEXT DEFAULT NULL, INDEX IDX_2C4207950ED3CEA (returned_datas_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route_parameter (route_id INT NOT NULL, parameter_id INT NOT NULL, INDEX IDX_86D5441834ECB4E6 (route_id), INDEX IDX_86D544187C56DBD6 (parameter_id), PRIMARY KEY(route_id, parameter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route_method (route_id INT NOT NULL, method_id INT NOT NULL, INDEX IDX_6FAACBBD34ECB4E6 (route_id), INDEX IDX_6FAACBBD19883967 (method_id), PRIMARY KEY(route_id, method_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE parameter ADD CONSTRAINT FK_2A979110C54C8C93 FOREIGN KEY (type_id) REFERENCES data_type (id)');
        $this->addSql('ALTER TABLE route ADD CONSTRAINT FK_2C4207950ED3CEA FOREIGN KEY (returned_datas_type_id) REFERENCES returned_datas_type (id)');
        $this->addSql('ALTER TABLE route_parameter ADD CONSTRAINT FK_86D5441834ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_parameter ADD CONSTRAINT FK_86D544187C56DBD6 FOREIGN KEY (parameter_id) REFERENCES parameter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_method ADD CONSTRAINT FK_6FAACBBD34ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_method ADD CONSTRAINT FK_6FAACBBD19883967 FOREIGN KEY (method_id) REFERENCES method (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE parameter DROP FOREIGN KEY FK_2A979110C54C8C93');
        $this->addSql('ALTER TABLE route_method DROP FOREIGN KEY FK_6FAACBBD19883967');
        $this->addSql('ALTER TABLE route_parameter DROP FOREIGN KEY FK_86D544187C56DBD6');
        $this->addSql('ALTER TABLE route DROP FOREIGN KEY FK_2C4207950ED3CEA');
        $this->addSql('ALTER TABLE route_parameter DROP FOREIGN KEY FK_86D5441834ECB4E6');
        $this->addSql('ALTER TABLE route_method DROP FOREIGN KEY FK_6FAACBBD34ECB4E6');
        $this->addSql('DROP TABLE data_type');
        $this->addSql('DROP TABLE header');
        $this->addSql('DROP TABLE method');
        $this->addSql('DROP TABLE parameter');
        $this->addSql('DROP TABLE request');
        $this->addSql('DROP TABLE returned_datas_type');
        $this->addSql('DROP TABLE route');
        $this->addSql('DROP TABLE route_parameter');
        $this->addSql('DROP TABLE route_method');
    }
}
