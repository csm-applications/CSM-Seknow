package br.com.GCEval.resource;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.model.Company;
import br.com.GCEval.model.Grouping;
import br.com.GCEval.repository.GroupingRepository;

@RestController
@RequestMapping("/groups")
public class GroupingResource {

    @Autowired
    private GroupingRepository groupRepository;

    @GetMapping
    public List<Grouping> findAll() {
        return groupRepository.findAll();
    }

    @GetMapping("/{id}")
    public Optional<Grouping> findById(@PathVariable Integer id) {

        Optional<Grouping> group = groupRepository.findById(id);
        return group;

    }

}
