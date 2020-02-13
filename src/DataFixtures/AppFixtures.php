<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\CompanyAddress;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

final class AppFixtures extends Fixture
{
    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        // generate companies
        for ($cp = 0; $cp < 5; $cp++) {
            $company = new Company();

            $company->setName($this->getRandomTerm());

            // generate companyAddresses
            for ($ca = 0; $ca < rand(0, 3); $ca++) {
                $companyAddress = new CompanyAddress();

                $companyAddress->setLabel($this->getRandomTerm());
                $companyAddress->setAddress('7751 Vermont Avenue');
                $companyAddress->setCity('Stockbridge');
                $companyAddress->setZipCode('30281');
                $companyAddress->setCountry('United States');
                //first companyAddress is HQ
                if ($ca === 0) {
                    $companyAddress->setIsHeadquarter(true);
                }

                // generate contacts
                for ($ct = 0; $ct < rand(0, 3); $ct++) {
                    $contact = new Contact();

                    $term = $this->getRandomTerm();
                    $names = explode(' ', $term);

                    //select noun
                    $contact->setFirstname($names[1]);
                    //select adjective
                    $contact->setLastname($names[0]);
                    $contact->setEmail(str_replace(' ', '.', strtolower($term))  . '@example.com');
                    $contact->setPhone('0123456789');
                    $contact->setMobile('0987654321');

                    $companyAddress->addContact($contact);
                }
                $company->addCompanyAddress($companyAddress);
            }
            $manager->persist($company);
        }

        $manager->flush();
    }

    /**
     * returns a random combination of two sets
     * @return string
     */
    private function getRandomTerm(): string
    {
        $adjectives = [
            'tiny',
            'delicious',
            'gentle',
            'agreeable',
            'brave',
            'orange',
            'grumpy',
            'fierce',
            'victorious',
        ];
        $nouns = [
            'elephant',
            'pizza',
            'jellybean',
            'chef',
            'puppy',
            'gnome',
            'kangaroo',
        ];

        return sprintf('%s %s', ucfirst($adjectives[array_rand($adjectives)]), ucfirst($nouns[array_rand($nouns)]));
    }
}
