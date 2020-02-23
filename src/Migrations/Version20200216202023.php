<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200216202023 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dic_header_request (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dic_header_response (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header_response (id INT AUTO_INCREMENT NOT NULL, header_id INT NOT NULL, value LONGTEXT DEFAULT NULL, INDEX IDX_8FA60A812EF91FD8 (header_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE header_response ADD CONSTRAINT FK_8FA60A812EF91FD8 FOREIGN KEY (header_id) REFERENCES dic_header_response (id)');
        $this->addSql('ALTER TABLE header_request ADD header_id INT NOT NULL, ADD value LONGTEXT DEFAULT NULL, DROP label');
        $this->addSql('ALTER TABLE header_request ADD CONSTRAINT FK_ED7FD1A42EF91FD8 FOREIGN KEY (header_id) REFERENCES dic_header_request (id)');
        $this->addSql('CREATE INDEX IDX_ED7FD1A42EF91FD8 ON header_request (header_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE header_request DROP FOREIGN KEY FK_ED7FD1A42EF91FD8');
        $this->addSql('ALTER TABLE header_response DROP FOREIGN KEY FK_8FA60A812EF91FD8');
        $this->addSql('DROP TABLE dic_header_request');
        $this->addSql('DROP TABLE dic_header_response');
        $this->addSql('DROP TABLE header_response');
        $this->addSql('DROP INDEX IDX_ED7FD1A42EF91FD8 ON header_request');
        $this->addSql('ALTER TABLE header_request ADD label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP header_id, DROP value');
    }
}
