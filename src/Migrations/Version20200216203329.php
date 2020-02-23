<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200216203329 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE route_header_request (route_id INT NOT NULL, header_request_id INT NOT NULL, INDEX IDX_BD29798534ECB4E6 (route_id), INDEX IDX_BD297985E0A9A892 (header_request_id), PRIMARY KEY(route_id, header_request_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route_header_response (route_id INT NOT NULL, header_response_id INT NOT NULL, INDEX IDX_C39F4C7734ECB4E6 (route_id), INDEX IDX_C39F4C7743EC5A5F (header_response_id), PRIMARY KEY(route_id, header_response_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE route_header_request ADD CONSTRAINT FK_BD29798534ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_header_request ADD CONSTRAINT FK_BD297985E0A9A892 FOREIGN KEY (header_request_id) REFERENCES header_request (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_header_response ADD CONSTRAINT FK_C39F4C7734ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_header_response ADD CONSTRAINT FK_C39F4C7743EC5A5F FOREIGN KEY (header_response_id) REFERENCES header_response (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE route_header_request');
        $this->addSql('DROP TABLE route_header_response');
    }
}
