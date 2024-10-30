<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241030082030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE revisions (id SERIAL NOT NULL, timestamp TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, username VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_audit (id INT NOT NULL, rev INT NOT NULL, login VARCHAR(140) DEFAULT NULL, email VARCHAR(180) DEFAULT NULL, first_name VARCHAR(140) DEFAULT NULL, last_name VARCHAR(180) DEFAULT NULL, roles JSON DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev))');
        $this->addSql('CREATE INDEX rev_e06395edc291d0719bee26fd39a32e8a_idx ON user_audit (rev)');
        $this->addSql('ALTER TABLE user_audit ADD CONSTRAINT rev_e06395edc291d0719bee26fd39a32e8a_fk FOREIGN KEY (rev) REFERENCES revisions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD login VARCHAR(140) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_audit DROP CONSTRAINT rev_e06395edc291d0719bee26fd39a32e8a_fk');
        $this->addSql('DROP TABLE revisions');
        $this->addSql('DROP TABLE user_audit');
        $this->addSql('ALTER TABLE "user" DROP login');
    }
}
