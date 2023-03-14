<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314110524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stadium (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, division VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, established VARCHAR(255) NOT NULL, head_coach VARCHAR(255) NOT NULL, owner VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_stadium (team_id INT NOT NULL, stadium_id INT NOT NULL, INDEX IDX_197D7578296CD8AE (team_id), INDEX IDX_197D75787E860E36 (stadium_id), PRIMARY KEY(team_id, stadium_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_stadium ADD CONSTRAINT FK_197D7578296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_stadium ADD CONSTRAINT FK_197D75787E860E36 FOREIGN KEY (stadium_id) REFERENCES stadium (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team_stadium DROP FOREIGN KEY FK_197D7578296CD8AE');
        $this->addSql('ALTER TABLE team_stadium DROP FOREIGN KEY FK_197D75787E860E36');
        $this->addSql('DROP TABLE stadium');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_stadium');
        $this->addSql('DROP TABLE user');
    }
}
