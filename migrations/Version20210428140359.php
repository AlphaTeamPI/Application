<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210428140359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte (IDCard INT AUTO_INCREMENT NOT NULL, typeOfCard VARCHAR(200) NOT NULL, DateIncription DATE DEFAULT NULL, DateExpiration DATE DEFAULT NULL, ImageCard VARCHAR(110) NOT NULL, UserName VARCHAR(20) NOT NULL, UNIQUE INDEX UserName (UserName), PRIMARY KEY(IDCard)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (post INT DEFAULT NULL, idC INT AUTO_INCREMENT NOT NULL, contenuC VARCHAR(400) NOT NULL, dateC DATETIME DEFAULT NULL, idCommenter INT DEFAULT NULL, INDEX IDX_5F9E962A579F365C (idCommenter), INDEX IDX_5F9E962A5A8A6C8D (post), PRIMARY KEY(idC)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_rating (id INT AUTO_INCREMENT NOT NULL, user INT DEFAULT NULL, post INT DEFAULT NULL, rating INT DEFAULT NULL, INDEX IDX_E8ABC2478D93D649 (user), INDEX IDX_E8ABC2475A8A6C8D (post), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A579F365C FOREIGN KEY (idCommenter) REFERENCES user (IDUser)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A5A8A6C8D FOREIGN KEY (post) REFERENCES posts (idp)');
        $this->addSql('ALTER TABLE post_rating ADD CONSTRAINT FK_E8ABC2478D93D649 FOREIGN KEY (user) REFERENCES user (IDUser)');
        $this->addSql('ALTER TABLE post_rating ADD CONSTRAINT FK_E8ABC2475A8A6C8D FOREIGN KEY (post) REFERENCES posts (idp)');
        $this->addSql('ALTER TABLE user CHANGE PasswordOublie PasswordOublie INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE post_rating');
        $this->addSql('ALTER TABLE user CHANGE PasswordOublie PasswordOublie INT DEFAULT NULL');
    }
}
