<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookTypeForm;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class BookController extends AbstractController
{
    #[Route('/library', name: 'app_library')]
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    #[Route('/library/create', name: 'create_book', methods: ['GET'])]
    public function createBook(): Response {

        $book = new Book();
        $form = $this->createForm(BookTypeForm::class, $book);

        return $this->render('book/createbook.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/library/add', name: 'add_book', methods: ['POST'])]
    public function addBook(
        Request $request,
        ManagerRegistry $doctrine
    ): Response {

        $entityManager = $doctrine->getManager();

        $book = new Book();
        $form = $this->createForm(BookTypeForm::class, $book);
        $form->handleRequest($request);

    // tell Doctrine you want to (eventually) save the Book
    $entityManager->persist($book);

    // actually executes the queries (i.e. the INSERT query)
    $entityManager->flush();

    return $this->redirectToRoute('app_library');
    }

    #[Route('/library/show', name: 'library_show_all')]
    public function showAllBooks(
        BookRepository $bookRepository
    ): Response {
        $books = $bookRepository
            ->findAll();

    return $this->render('book/viewbooks.html.twig', [
        'books' => $books,
    ]);
    }
    #[Route('/library/show/{id}', name: 'book_by_id')]
    public function showBookById(
        BookRepository $bookRepository,
        int $id
    ): Response {
        $book = $bookRepository
            ->find($id);

        return $this->render('book/viewbookid.html.twig', [
            'book' => $book,
        ]);
    }

    #[Route('/library/update/{id}', name: 'update_book', methods: ['GET'])]
    public function formUpdateBook(
        BookRepository $bookRepository,
        int $id
    ): Response {

        $book = $bookRepository->find($id);

        return $this->render('book/updatebook.html.twig', [
            'book' => $book,
        ]);
    }

    #[Route('/library/updated/{id}', name: 'updated_book', methods: ['POST'])]
    public function newUpdatedBook(
        Request $request,
        ManagerRegistry $doctrine,
        int $id
    ): Response {

        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        $book->setTitel($request->request->get('titel'));
        $book->setIsbn($request->request->get('isbn'));
        $book->setAuthor($request->request->get('author'));

        $entityManager->flush();

        return $this->redirectToRoute('book_by_id', ['id' => $book->getId()]);
    }

    #[Route('/library/delete/{id}', name: 'delete_book', methods: ['POST'])]
    public function deleteBook(
        Request $request,
        ManagerRegistry $doctrine,
        int $id
    ): Response {

        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);

        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }
}
