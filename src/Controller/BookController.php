<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Emprunt;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("member/book")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="livre_index")
     */
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findActiveBook();
        return $this->render('book/index.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/{id}/emprunter", name="livre_emprunter")
     */
    public function emprunter(Book $book, EntityManagerInterface $entityManagerInterface): Response
    {
        $user = $this->getUser();
        
        $emprunt = new Emprunt();
        $emprunt->setUser($user)->setLivre($book);
        
        $entityManagerInterface->persist($emprunt);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('livre_index');
    }
}
