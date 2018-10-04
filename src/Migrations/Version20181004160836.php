<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181004160836 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE office_employees (id INT AUTO_INCREMENT NOT NULL, offices_id INT NOT NULL, emp_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_AC76AA39DB8DF936 (offices_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offices (id INT AUTO_INCREMENT NOT NULL, office_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE office_employees ADD CONSTRAINT FK_AC76AA39DB8DF936 FOREIGN KEY (offices_id) REFERENCES offices (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE office_employees DROP FOREIGN KEY FK_AC76AA39DB8DF936');
        $this->addSql('DROP TABLE office_employees');
        $this->addSql('DROP TABLE offices');
    }
}
