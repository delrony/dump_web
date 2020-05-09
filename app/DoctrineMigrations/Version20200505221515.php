<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20200505221515 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_content (category_id INT NOT NULL, content_id INT NOT NULL, INDEX IDX_391D70D712469DE2 (category_id), INDEX IDX_391D70D784A0A3ED (content_id), PRIMARY KEY(category_id, content_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contents (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(500) NOT NULL, file_path VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_content (tag_id INT NOT NULL, content_id INT NOT NULL, INDEX IDX_CCF41D03BAD26311 (tag_id), INDEX IDX_CCF41D0384A0A3ED (content_id), PRIMARY KEY(tag_id, content_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_content ADD CONSTRAINT FK_391D70D712469DE2 FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_content ADD CONSTRAINT FK_391D70D784A0A3ED FOREIGN KEY (content_id) REFERENCES contents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_content ADD CONSTRAINT FK_CCF41D03BAD26311 FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_content ADD CONSTRAINT FK_CCF41D0384A0A3ED FOREIGN KEY (content_id) REFERENCES contents (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category_content DROP FOREIGN KEY FK_391D70D712469DE2');
        $this->addSql('ALTER TABLE category_content DROP FOREIGN KEY FK_391D70D784A0A3ED');
        $this->addSql('ALTER TABLE tag_content DROP FOREIGN KEY FK_CCF41D0384A0A3ED');
        $this->addSql('ALTER TABLE tag_content DROP FOREIGN KEY FK_CCF41D03BAD26311');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE category_content');
        $this->addSql('DROP TABLE contents');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE tag_content');
    }
}
