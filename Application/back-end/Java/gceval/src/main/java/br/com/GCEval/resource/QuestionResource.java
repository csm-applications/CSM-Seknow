package br.com.GCEval.resource;

import br.com.GCEval.model.Diagnostic;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.model.Question;
import br.com.GCEval.model.Section;
import br.com.GCEval.repository.DiagnosticRepository;
import br.com.GCEval.repository.QuestionRepository;

@RestController
@RequestMapping("/questions")
public class QuestionResource {

    @Autowired
    private QuestionRepository questionRepository;

    @Autowired
    private DiagnosticRepository diagnosticRepository;

    @GetMapping
    public List<Question> findAll() {
        return questionRepository.findAll();
    }

    @GetMapping("/{id}")
    public Optional<Question> findById(@PathVariable Integer id) {

        Optional<Question> questions = questionRepository.findById(id);
        return questions;

    }

    @GetMapping("fromdiagnostic/{id}")
    public List<Section> findQuestionsFromDiagnostic(@PathVariable Integer id) {

        Optional<Diagnostic> diagnostic = diagnosticRepository.findById(id);
        if (diagnostic.get() != null) {
            return diagnostic.get().getSectionList();
        } else {
            return null;
        }
    }

}
