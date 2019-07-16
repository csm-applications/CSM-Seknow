package br.com.GCEval.resource;

import br.com.GCEval.model.Answer;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.model.Grouping;
import br.com.GCEval.repository.AnswerRepository;

@RestController
@RequestMapping("/answer")
public class AnswerResource {

    @Autowired
    private AnswerRepository answerRepository;

    @GetMapping
    public List<Answer> findAll() {
        return answerRepository.findAll();
    }

    @GetMapping("/{id}")
    public Optional<Answer> findById(@PathVariable Integer id) {

        Optional<Answer> group = answerRepository.findById(id);
        return group;

    }

}
