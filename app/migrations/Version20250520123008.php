<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250520123008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE loans ADD users_id INT DEFAULT NULL, ADD books_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE loans ADD CONSTRAINT FK_82C24DBC67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE loans ADD CONSTRAINT FK_82C24DBC7DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_82C24DBC67B3B43D ON loans (users_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_82C24DBC7DD8AC20 ON loans (books_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE loans DROP FOREIGN KEY FK_82C24DBC67B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE loans DROP FOREIGN KEY FK_82C24DBC7DD8AC20
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_82C24DBC67B3B43D ON loans
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_82C24DBC7DD8AC20 ON loans
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE loans DROP users_id, DROP books_id
        SQL);
    }
}
