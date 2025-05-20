<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250520123655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE authors_books (authors_id INT NOT NULL, books_id INT NOT NULL, INDEX IDX_2DFDA3CB6DE2013A (authors_id), INDEX IDX_2DFDA3CB7DD8AC20 (books_id), PRIMARY KEY(authors_id, books_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE authors_books ADD CONSTRAINT FK_2DFDA3CB6DE2013A FOREIGN KEY (authors_id) REFERENCES authors (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE authors_books ADD CONSTRAINT FK_2DFDA3CB7DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE authors_books DROP FOREIGN KEY FK_2DFDA3CB6DE2013A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE authors_books DROP FOREIGN KEY FK_2DFDA3CB7DD8AC20
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE authors_books
        SQL);
    }
}
