<?php 
namespace Enregistrement;

use App\Entity\Etudiant;
use App\Entity\Filiere;
use App\Entity\Inscription;
use App\Entity\Matiere;
use App\Entity\Niveau;
use App\Entity\NotesEtudiant;
use App\Entity\Semestre;
use App\Entity\Ue;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

class EcritureFiliere{

    function Enregistrer($tableauValaleurs, User $utilisateur, ManagerRegistry $enregistreur)
    {
        foreach ($tableauValaleurs as $key => $value) {
            $k[] = $key;
            $v[] = $value;
        }
        $k = implode(",", $k);
        $v = implode(",", $v);
        
        $object = new Filiere;
        $object->setUser($utilisateur);
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setSigle(strtoupper($tableauValaleurs['sigle']));
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->persist($object);
        $manager->flush();
    }

    function MettreAJour($tableauValaleurs,Filiere $object, ManagerRegistry $enregistreur)
    {
        foreach ($tableauValaleurs as $key => $value) {
            $k[] = $key;
            $v[] = $value;
        }
        $k = implode(",", $k);
        $v = implode(",", $v);
        
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setSigle(strtoupper($tableauValaleurs['sigle']));
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->flush();
    }

}

class EcritureClasse{

    function Enregistrer($tableauValaleurs, User $utilisateur, ManagerRegistry $enregistreur)
    {
        foreach ($tableauValaleurs as $key => $value) {
            $k[] = $key;
            $v[] = $value;
        }
        $k = implode(",", $k);
        $v = implode(",", $v);
        
        $object = new Niveau;
        $object->setUser($utilisateur);
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->persist($object);
        $manager->flush();
    }

    function MettreAJour($tableauValaleurs,Niveau $object, ManagerRegistry $enregistreur)
    {
        foreach ($tableauValaleurs as $key => $value) {
            $k[] = $key;
            $v[] = $value;
        }
        $k = implode(",", $k);
        $v = implode(",", $v);
        
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->flush();
    }
    
}

class EcritureSemestre{

    function Enregistrer($tableauValaleurs, User $utilisateur, ManagerRegistry $enregistreur)
    {
        foreach ($tableauValaleurs as $key => $value) {
            $k[] = $key;
            $v[] = $value;
        }
        $k = implode(",", $k);
        $v = implode(",", $v);
        
        $object = new Semestre;
        $object->setUser($utilisateur);
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->persist($object);
        $manager->flush();
    }

    function MettreAJour($tableauValaleurs,Semestre $object, ManagerRegistry $enregistreur)
    {
        foreach ($tableauValaleurs as $key => $value) {
            $k[] = $key;
            $v[] = $value;
        }
        $k = implode(",", $k);
        $v = implode(",", $v);
        
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->flush();
    }
    
}

class EcritureMatiere{

    function Enregistrer($tableauValaleurs, User $utilisateur, ManagerRegistry $enregistreur)
    {
        // foreach ($tableauValaleurs as $key => $value) {
        //     $k[] = $key;
        //     $v[] = $value;
        // }
        // $k = implode(",", $k);
        // $v = implode(",", $v);
        
        $object = new Matiere;
        $object->setUser($utilisateur);
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setCreatedAt(new \datetime);

        $ue=new Ue;
        $ue->setFiliere($tableauValaleurs['filiere']);
        $ue->setNiveau($tableauValaleurs['niveau']);
        $ue->setSemestre($tableauValaleurs['semestre']);
        $ue->setUser($utilisateur);
        $ue->setMatiere($object);
        $ue->setNote($tableauValaleurs['note']);
        $ue->setCode($tableauValaleurs['code']);
        $ue->setCreatedAt(new \DateTime);
        $manager = $enregistreur->getManager();
        $manager->persist($ue);
        $manager->flush();
    }

    function MettreAJour($tableauValaleurs,Matiere $object, ManagerRegistry $enregistreur)
    {
        foreach ($tableauValaleurs as $key => $value) {
            $k[] = $key;
            $v[] = $value;
        }
        $k = implode(",", $k);
        $v = implode(",", $v);
        
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->flush();
    }
    
}

class EcritureCours{

    function Enregistrer(Matiere $matiere,Niveau $classe,Filiere $filiere,Semestre $semestre, User $utilisateur, ManagerRegistry $enregistreur)
    {
        // foreach ($tableauValaleurs as $key => $value) {
        //     $k[] = $key;
        //     $v[] = $value;
        // }
        // $k = implode(",", $k);
        // $v = implode(",", $v);
        
        $object = new Ue;
        $object->setUser($utilisateur);
        $object->setMatiere($matiere);
        $object->setNiveau($classe);
        $object->setFiliere($filiere);
        $object->setSemestre($semestre);
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->persist($object);
        $manager->flush();
    }

    function MettreAJour(Ue $object,Matiere $matiere,Niveau $classe,Filiere $filiere,Semestre $semestre, ManagerRegistry $enregistreur)
    {
        // foreach ($tableauValaleurs as $key => $value) {
        //     $k[] = $key;
        //     $v[] = $value;
        // }
        // $k = implode(",", $k);
        // $v = implode(",", $v);
        $object->setMatiere($matiere);
        $object->setNiveau($classe);
        $object->setFiliere($filiere);
        $object->setSemestre($semestre);
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->flush();
    }
    
}

class EcritureEtudiant{

    function persistance(ManagerRegistry $managerRegistry ,$Entity){
       
        $manager=$managerRegistry->getManager();
        $manager->persist($Entity);
        $manager->flush();
    }

    function Enregistrer($tableauValaleurs, User $utilisateur)
    {

        //on enregistre
        $object = new Etudiant;
        $object->setUser($utilisateur);
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setPrenom(ucfirst($tableauValaleurs['prenom']));
        $object->setSexe(ucfirst($tableauValaleurs['sexe']));
        $object->setCreatedAt(new \datetime);
        //on inscrit
        $inscription=new Inscription();
        $inscription->setEtudiant($object);
        $inscription->setFiliere($tableauValaleurs['filiere']);
        $inscription->setNiveau($tableauValaleurs['niveau']);
        $inscription->setCreatedAt(new \datetime);
        //on retourne les resultats
        return $inscription;

    }

    function MettreAJour($tableauValaleurs,Etudiant $object, ManagerRegistry $enregistreur)
    {
        // foreach ($tableauValaleurs as $key => $value) {
        //     $k[] = $key;
        //     $v[] = $value;
        // }
        // $k = implode(",", $k);
        // $v = implode(",", $v);
        
        $object->setNom(ucfirst($tableauValaleurs['nom']));
        $object->setPrenom(ucfirst($tableauValaleurs['prenom']));
        $object->setSexe(ucfirst($tableauValaleurs['sexe']));
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->flush();
    }
    
}

class EcritureInscription{

    function Enregistrer(Etudiant $etudiant,Niveau $classe,Filiere $filiere, User $utilisateur, ManagerRegistry $enregistreur)
    {
        // foreach ($tableauValaleurs as $key => $value) {
        //     $k[] = $key;
        //     $v[] = $value;
        // }
        // $k = implode(",", $k);
        // $v = implode(",", $v);
        
        $object = new Inscription;
        $object->setUser($utilisateur);
        $object->setEtudiant($etudiant);
        $object->setNiveau($classe);
        $object->setFiliere($filiere);
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->persist($object);
        $manager->flush();
    }

    function MettreAJour(Inscription $object,Niveau $classe,Filiere $filiere, ManagerRegistry $enregistreur)
    {
        // foreach ($tableauValaleurs as $key => $value) {
        //     $k[] = $key;
        //     $v[] = $value;
        // }
        // $k = implode(",", $k);
        // $v = implode(",", $v);
        $object->setNiveau($classe);
        $object->setFiliere($filiere);
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->flush();
    }
    
}

class EcritureNote{

    function Enregistrer($tableauValeurs,Inscription $inscription,Ue $cours,Semestre $semestre, User $utilisateur, ManagerRegistry $enregistreur)
    {
        // foreach ($tableauValaleurs as $key => $value) {
        //     $k[] = $key;
        //     $v[] = $value;
        // }
        // $k = implode(",", $k);
        // $v = implode(",", $v);
        
        $object = new NotesEtudiant;
        $object->setUser($utilisateur);
        $object->setInscription($inscription);
        $object->setUe($cours);
        $object->setSemestre($semestre);
        $object->setMoyenne($tableauValeurs['moyenne']);
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->persist($object);
        $manager->flush();
    }

    function MettreAJour($tableauValaleurs,NotesEtudiant $object, ManagerRegistry $enregistreur)
    {
        // foreach ($tableauValaleurs as $key => $value) {
        //     $k[] = $key;
        //     $v[] = $value;
        // }
        // $k = implode(",", $k);
        // $v = implode(",", $v);
        
        $object->setMoyenne(ucfirst($tableauValaleurs['moyenne']));
        $object->setCreatedAt(new \datetime);
        $manager = $enregistreur->getManager();
        $manager->flush();
    }
    
}