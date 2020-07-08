<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20200708185614 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category_content DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE category_content ADD PRIMARY KEY (content_id, category_id)');
        $this->addSql('ALTER TABLE tag_content DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tag_content ADD PRIMARY KEY (content_id, tag_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category_content DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE category_content ADD PRIMARY KEY (category_id, content_id)');
        $this->addSql('ALTER TABLE tag_content DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tag_content ADD PRIMARY KEY (tag_id, content_id)');
    }
}
